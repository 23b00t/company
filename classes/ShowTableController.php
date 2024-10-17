<?php

/**
 * Class: ShowTableController
 *
 */
class ShowTableController
{
    private string $area;

    /**
     * @param string $area
     * @param string $view
     */
    public function __construct(string $area)
    {
        $this->area = $area;
    }

    /**
     * @return Employee[]|Car[]
     */
    public function run(): array
    {
        if ($this->area === 'employee') {
            $employees = (new Employee())->getAllAsObjects();
            return $employees;
        } elseif ($this->area === 'car') {
            $cars = (new Car())->getAllAsObjects();
            return $cars;
        }
    }
}
