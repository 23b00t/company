<?php

/**
 * Class Rental
 */
class Rental implements IBasic
{
    private ?int $employeeId;
    private ?int $carId;
    private ?string $rentalFrom;
    private ?string $rentalTo;
    private ?int $id;

    /**
     * @param int $employeeId
     * @param int $carId
     * @param string $rentalFrom
     * @param string $rentalTo
     */
    public function __construct(
        int $id = null,
        int $employeeId = null,
        int $carId = null,
        string $rentalFrom = null,
        string $rentalTo = null
    ) {
        $this->employeeId = $employeeId;
        $this->carId = $carId;
        $this->rentalFrom = $rentalFrom;
        $this->rentalTo = $rentalTo;
        $this->id = $id;
    }

    /**
     * getAllAsObjects
     *
     * @return array
     */
    public function getAllAsObjects(): array
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM rental';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Rental::class);
    }

    /**
     * deleteObjectById
     *
     * @param int $id
     * @return void
     */
    public function deleteObjectById(int $id): void
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM rental WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    /**
     * insert
     *
     * @param int $employeeId
     * @param int $carId
     * @param string $rentalFrom
     * @param string $rentalTo
     *
     * @return Rental
     */
    public function insert(int $employeeId, int $carId, string $rentalFrom, string $rentalTo): Rental
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO rental VALUES(NULL, ?, ?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$employeeId, $carId, $rentalFrom, $rentalTo]);
        $id = $pdo->lastInsertId();
        return new Rental($id, $employeeId, $carId, $rentalFrom, $rentalTo);
    }

    /**
     * getObjectById
     *
     * @param int $id
     * @return Rental
     */
    public function getObjectById(int $id): Rental
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM rental WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Rental::class);
        return $stmt->fetch();
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
        $sql = 'UPDATE rental SET employeeId = ?, carId = ?, rentalFrom = ?, rentalTo = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [$this->employeeId, $this->carId, $this->rentalFrom, $this->rentalTo, $this->id]
        );
    }

    /**
     * getEmployeeId
     *
     * @return int
     */
    public function getEmployeeId(): int
    {
        return $this->employeeId;
    }

    /**
     * getCarId
     *
     * @return int
     */
    public function getCarId(): int
    {
        return $this->carId;
    }

    /**
     * getRentalFrom
     *
     * @return string
     */
    public function getRentalFrom(): string
    {
        return $this->rentalFrom;
    }

    /**
     * getRentalTo
     *
     * @return ?string
     */
    public function getRentalTo(): ?string
    {
        return $this->rentalTo;
    }

    /**
     * getId
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * getName
     *
     * @return string
     */
    public function getName(): string
    {
        return (new Employee())->getObjectById($this->employeeId)->getName();
    }

    /**
     * getLicensePlate
     *
     * @return string
     */
    public function getLicensePlate(): string
    {
        return (new Car())->getObjectById($this->carId)->getLicensePlate();
    }

    /**
     * getEmployeePulldown
     *
     * @return string
     */
    public function getEmployeePulldown(): string
    {
        $employeeId = $this->employeeId ?? null;
        return (new Employee())->getPulldownMenu($employeeId);
    }

    /**
     * getCarPulldown
     *
     * @return string
     */
    public function getCarPulldown(): string
    {
        $carId = $this->carId ?? null;
        return (new Car())->getPulldownMenu($carId);
    }
}
