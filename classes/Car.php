<?php

/**
 * Class Car
 */
class Car implements IBasic
{
    /**
     * @var int|null $id
     */
    private ?int $id;
    /**
     * @var string|null $licensePlate
     */
    private ?string $licensePlate;
    /**
     * @var string|null $manufacturer
     */
    private ?string $manufacturer;
    /**
     * @var string|null $type
     */
    private ?string $type;

    /**
     * @param int|null $id
     * @param string|null $licensePlate
     * @param string|null $manufacturer
     * @param string|null $type
     */
    public function __construct(
        int $id = null,
        string $licensePlate = null,
        string $manufacturer = null,
        string $type = null
    ) {
        if (isset($licensePlate)) {
            $this->id = $id;
            $this->licensePlate = $licensePlate;
            $this->manufacturer = $manufacturer;
            $this->type = $type;
        }
    }

    /**
     * getLicensePlate
     *
     * @return string
     */
    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    /**
     * getManufacturer
     *
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * getType
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * getId
     *
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * getAllAsObjects()
     *
     * @return Car[]
     */
    public function getAllAsObjects(): array
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM car';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Car::class); //  | PDO::FETCH_PROPS_LATE
    }

    /**
     * deleteObjectById()
     * Method to delete Car from db
     *
     * @param $id
     * @return void
     */
    public function deleteObjectById(int $id): void
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM car WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        // $stmt->fetch(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * insert
     *
     * @param string $licensePlate
     * @param string $manufacturer
     * @param string $type
     * @return Car
     */
    public function insert(string $licensePlate, string $manufacturer, string $type): Car
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO car VALUES(NULL, ?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$licensePlate, $manufacturer, $type]);
        $id = $pdo->lastInsertId();
        return new Car($id, $licensePlate, $manufacturer, $type);
    }

    /**
     * getObjectById
     *
     * @param int $id
     * @return Car
     */
    public function getObjectById(int $id): Car
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM car WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchObject(Car::class);
    }

    /**
     * update
     *
     * @return void
     */
    public function update(): void
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'UPDATE car SET licensePlate = ?, manufacturer = ?, type = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [$this->licensePlate, $this->manufacturer, $this->type, $this->id]
        );
    }

    /**
     * getPulldownMenu
     * Method to populate pulldown menu of Rental
     *
     * @return string
     * @param int $carId
     */
    public function getPulldownMenu(int $carId = null): string
    {
        $cars = $this->getAllAsObjects();

        // Build HTML string dynamically including all cars (by id) and display there license plate
        $html = '<select class="form-control" id="carId" name="carId" required>
                <option value="" disabled '
                // Select call to selection if the new route is used
                . ($carId === null ? 'selected' : '')
                . '>Fahrzeug auswählen</option>';

        // Iterate over all cars and add them to the pulldown menu
        foreach ($cars as $car) {
            $html .= '<option value="' . htmlspecialchars($car->getId())
                   . '"' . ($carId === $car->getId() ? ' selected' : '') . '>'
                   . htmlspecialchars($car->getLicensePlate())
                   . '</option>';
        }

        $html .= '</select>';

        return $html;
    }
}
