<?php

/**
 * Class: UpdateController
 *
 */
class UpdateController
{
    private string $area;
    private string $view;


    /**
     * @param string $area
     * @param int $id
     * @param array $data
     */
    public function __construct(string $area, string &$view)
    {
        $this->area = $area;
        $view = 'table';
        $this->view = $view;
    }

    /**
     * @return Employee[]|Car[]
     * @param int $id
     * @param array<int,mixed> $data
     */
    public function invoke(int $id, array $data): array
    {
        if ($this->area === 'employee') {
            $employee = new Employee($id, ...$data);
            $employee->update();

            return $employee->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $car = new Car($id, ...$data);
            $car->update();

            return $car->getAllAsObjects();
        }
    }
}
