<?php

/**
 * Class Auto
 */
class Auto
{
    private int|null $id;
    private string|null $licensePlate;
    private string|null $manufacturer;
    private string|null $type;

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
     * @return Auto[]
     */
    public function getAllAsObjects(): array
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM car';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Auto::class); //  | PDO::FETCH_PROPS_LATE
    }

    /**
     * deleteObjectById()
     * Method to delete Auto from db
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
     * @return Auto
     */
    public function insert(string $licensePlate, string $manufacturer, string $type): Auto
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO car VALUES(NULL, ?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$licensePlate, $manufacturer, $type]);
        $id = $pdo->lastInsertId();
        return new Auto($id, $licensePlate, $manufacturer, $type);
    }

    /**
     * getObjectById
     *
     * @param int $id
     * @return Auto
     */
    public function getObjectById(int $id): Auto
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM car WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchObject(Auto::class);
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
}
