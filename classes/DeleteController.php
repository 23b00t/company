<?php

/**
 * Class: DeleteController
 *
 */
class DeleteController
{
    private string $area;
    private int $id;

    /**
     * @param string $area
     * @param int $id
     */
    public function __construct(string $area, int $id)
    {
        $this->area = $area;
        $this->id = $id;
    }

    /**
     * @return Employee[]|Car[]
     */
    public function run(): array
    {
        if ($this->area === 'employee') {
            $employee = new Employee();
            $employee->deleteObjectById($this->id);

            return $employee->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->deleteObjectById($this->id);

            return $car->getAllAsObjects();
        }
    }
}
