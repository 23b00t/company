<?php

/**
 * Class: UpdateController
 *
 */
class UpdateController
{
    private string $area;
    private int $id;
    private array $data;

    /**
     * @param string $area
     * @param int $id
     * @param array $data
     */
    public function __construct(string $area, int $id, array $data)
    {
        $this->area = $area;
        $cleanedData = array_values(array_filter($data, fn($value) => $value !== ''));
        $cleanedData[] = $id;
        $this->data = $cleanedData;
    }

    /**
     * @return Employee[]|Car[]
     */
    public function run(): array
    {
        if ($this->area === 'employee') {
            $employee = new Employee();
            $employee->update(...$this->data);

            return $employee->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->update(...$this->data);

            return $car->getAllAsObjects();
        }
    }
}
