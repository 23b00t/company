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
        $this->area = $area;
        $view = 'form';
    }

    /**
     * @return array
     * @param int $id
     * @param string $action
     */
    public function invoke(int $id, string &$action): array
    {
        $action = 'update';
        if ($this->area === 'employee') {
            $employee = (new Employee())->getObjectById($id);
            return [$employee];
        } elseif ($this->area === 'car') {
            $car = (new Car())->getObjectById($id);
            return [$car];
        }
    }
}
