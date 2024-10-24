<?php

/**
 * Class Employee
 */
class Employee implements IBasic
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
        if (isset($gender)) {
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
     * @return ?int
     */
    public function getId(): ?int
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
     * @return Employee[]
     */
    public function getAllAsObjects(): array
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM employee';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Employee::class); //  | PDO::FETCH_PROPS_LATE
    }

    /**
     * deleteObjectById()
     * Method to delete Employee from db
     *
     * @param $id
     * @return void
     */
    public function deleteObjectById(int $id): void
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM employee WHERE id = ?';
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
     * @return Employee
     */
    public function insert(string $firstName, string $lastName, string $gender, float $salaray): Employee
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'INSERT INTO employee VALUES(NULL, ?, ?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstName, $lastName, $gender, $salaray]);
        $id = $pdo->lastInsertId();
        return new Employee($id, $firstName, $lastName, $gender, $salaray);
    }

    /**
     * getObjectById
     *
     * @param int $id
     * @return Employee
     */
    public function getObjectById(int $id): Employee
    {
        /** @var PDO $pdo */
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM employee WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchObject(Employee::class);
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
        $sql = 'UPDATE employee SET firstName = ?, lastName = ?, gender = ?, salary = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [$this->firstName, $this->lastName, $this->gender, $this->salary, $this->id]
        );
    }

    public function getName(): string
    {
        return ($this->getFirstName() . ' ' . $this->getLastName());
    }

    /**
     * getPulldownMenu
     *
     * @return string
     * @param int $employeeId
     */
    public function getPulldownMenu($employeeId): string
    {
        $employees = $this->getAllAsObjects();
        $html = '<select class="form-control" id="employeeId" name="employeeId" required>
                <option value="" disabled '
                . ($employeeId === null ? 'selected' : '')
                . '>Mitarbeiter auswählen</option>';

        foreach ($employees as $employee) {
            $html .= '<option value="' . htmlspecialchars($employee->getId())
                   . '"' . ($employeeId === $employee->getId() ? ' selected' : '') . '>'
                   . htmlspecialchars($employee->getName())
                   . '</option>';
        }

        $html .= '</select>';

        return $html;
    }
}
