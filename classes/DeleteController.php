<?php

/**
 * Class: DeleteController
 *
 */
class DeleteController
{
    private string $area;
    private string $view;

    /**
     * @param string $area
     * @param int $id
     */
    public function __construct(string $area, int &$view)
    {
        $this->area = $area;
        $view = 'table';
    }

    /**
     * @return Employee[]|Car[]
     * @param int $id
     */
    public function invoke(int $id): array
    {
        if ($this->area === 'employee') {
            $employee = new Employee();
            $employee->deleteObjectById($id);

            return $employee->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->deleteObjectById($id);

            return $car->getAllAsObjects();
        }
    }
}
