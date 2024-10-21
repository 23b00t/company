<?php

/**
 * Class: InsertController
 *
 */
class InsertController
{
    private string $area;
    private string $view;

    /**
     * @param string $area
     * @param array $data
     */
    public function __construct(string $area, string &$view)
    {
        $this->area = $area;
        $view = 'table';
    }

    /**
     * @return Employee[]|Car[]
     * @param array<int,mixed> $data
     */
    public function invoke(array $data): array
    {
        if ($this->area === 'employee') {
            $employee = new Employee();
            $employee->insert(...$data);

            return $employee->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->insert(...$data);

            return $car->getAllAsObjects();
        }
    }
}
