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
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * @return Employee[]|Car[]
     */
    public function run(): array
    {
        if ($this->area === 'employee') {
            $employee = new Employee($this->id, ...$this->data);
            $employee->update();

            return $employee->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $car = new Car($this->id, ...$this->data);
            $car->update();

            return $car->getAllAsObjects();
        }
    }
}
