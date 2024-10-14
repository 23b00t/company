<?php

/**
 * Class Mitarbeiter
 */
class Mitarbeiter
{
    /**
     * @var int|null $id
     */
    private int|null $id;
    /**
     * @var string|null $firstName
     */
    private string|null $firstName;
    /**
     * @var string|null $lastName
     */
    private string|null $lastName;
    /**
     * @var string|null $gender
     */
    private string|null $gender;
    /**
     * @var float|null $salary
     */
    private float|null $salary;

    /**
     * @param int|null $id
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $gender
     * @param float|null $salary
     */
    public function __construct(
        int $id = null,
        string $firstName = null,
        string $lastName = null,
        string $gender = null,
        float $salary = null
    ) {
        if (isset($id)) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->gender = $gender;
            $this->salary = $salary;
        }
    }

    /**
     * getId()
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * getFirstName()
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * getLastName()
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * getGender()
     *
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * getSalary()
     *
     * @return ?float
     * return null to display empty form
     */
    public function getSalary(): ?float
    {
        return $this->salary;
    }

    /**
     * getAllAsObjects()
     *
     * @return Mitarbeiter[]
     */
    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM mitarbeiter';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Mitarbeiter::class); //  | PDO::FETCH_PROPS_LATE
    }

    /**
     * deleteObjectById()
     * Method to delete Mitarbeiter from db
     *
     * @param $id
     * @return void
     */
    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM mitarbeiter WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        // $stmt->fetch(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * insert
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $gender
     * @param float $salaray
     * @return Mitarbeiter
     */
    public function insert(string $firstName, string $lastName, string $gender, float $salaray): Mitarbeiter
    {
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO mitarbeiter VALUES(NULL, ?, ?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstName, $lastName, $gender, $salaray]);
        $id = $pdo->lastInsertId();
        return new Mitarbeiter($id, $firstName, $lastName, $gender, $salaray);
    }

    /**
     * getObjectById
     *
     * @param int $id
     * @return Mitarbeiter
     */
    public function getObjectById(int $id): Mitarbeiter
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM mitarbeiter WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchObject(Mitarbeiter::class);
    }

    /**
     * update
     *
     * @return void
     */
    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE mitarbeiter SET firstName = ?, lastName = ?, gender = ?, salary = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [$this->getFirstName(), $this->getLastName(), $this->getGender(), $this->getSalary(), $this->getId()]
        );
    }
}
