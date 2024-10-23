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
    public function insert($employeeId, $carId, $rentalFrom, $rentalTo): Rental
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

    public function getEmployeeId(): int
    {
        return $this->employeeId;
    }

    public function getCarId(): int
    {
        return $this->carId;
    }

    public function getRentalFrom(): string
    {
        return $this->rentalFrom;
    }

    public function getRentalTo(): string
    {
        return $this->rentalTo;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
