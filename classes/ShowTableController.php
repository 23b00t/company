<?php

/**
 * Class: ShowTableController
 *
 */
class ShowTableController
{
    private string $area;
    private string $view;


    /**
     * @param string $area
     * @param string $view
     */
    public function __construct(string $area, string &$view)
    {
        $this->area = $area;
        $view = 'table';
    }

    /**
     * @return Employee[]|Car[]
     */
    public function invoke(): array
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
