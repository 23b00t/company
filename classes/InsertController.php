<?php

/**
 * Class: InsertController
 *
 */
class InsertController
{
    private string $area;
    private array $data;

    /**
     * @param string $area
     * @param array $data
     */
    public function __construct(string $area, array $data)
    {
        $this->area = $area;
        // $cleanedData = array_values(array_filter($data, fn($value) => $value !== ''));
        // $this->data = $cleanedData;
        $this->data = $data;
    }

    /**
     * @return Employee[]|Car[]
     */
    public function run(): array
    {
        if ($this->area === 'employee') {
            $employee = new Employee();
            $employee->insert(...$this->data);

            return $employee->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->insert(...$this->data);

            return $car->getAllAsObjects();
        }
    }
}
