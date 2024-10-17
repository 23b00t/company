<?php

/**
 * Class: ShowEditController
 *
 */
class ShowEditController
{
    private string $area;
    private int $id;
    private string $view;
    private string $action;

    /**
     * @param string $area
     * @param int $id
     * @param string $view
     * @param string $action
     */
    public function __construct(string $area, int $id, string &$view, string &$action)
    {
        $this->view = &$view;
        $this->action = &$action;
        $this->area = $area;
        $this->id = $id;
    }

    /**
     * @return Employee|Car
     */
    public function run(): Employee|Car
    {
        $this->view = 'form';
        $this->action = 'update';

        if ($this->area === 'employee') {
            $employee = (new Employee())->getObjectById($this->id);
            return $employee;
        } elseif ($this->area === 'car') {
            $car = (new Car())->getObjectById($this->id);
            return $car;
        }
    }
}
