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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @return string
     */
    public function firstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return array
     */
    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM mitarbeiter';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Mitarbeiter::class); //  | PDO::FETCH_PROPS_LATE
    }
}
