<?php

/**
 * Class Mitarbeiter
 */
class Mitarbeiter
{
    /**
     * @var int $id
     */
    private int $id;
    /**
     * @var string $firstName
     */
    private string $firstName;
    /**
     * @var string $lastName
     */
    private string $lastName;

    /**
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $gender
     * @param float $salary
     */
    public function __construct(string $firstName, string $lastName, string $gender, float $salary, int $id = null)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->salary = $salary;
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
     * @var string $gender
     */
    private string $gender;
    /**
     * @var float $salary
     */
    private float $salary;

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
    public static function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM mitarbeiter';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Mitarbeiter::class);
    }
}
