<?php

/**
 * Class: DeleteController
 *
 */
class DeleteController
{
    /**
     * @var string $area
     */
    private string $area;
    /**
     * @var int $id
     */
    private int $id;

    /**
     * __construct
     *
     * @param string $area
     * @param string $view
     * @param int $id
     */
    public function __construct(string $area, string &$view, int $id)
    {
        $this->area = $area;
        $view = 'table';
        $this->id = $id;
    }

    /**
     * @return Employee[]|Car[]
     */
    public function invoke(): array
    {
        $array = [];
        if ($this->area === 'employee') {
            $employee = new Employee();
            $employee->deleteObjectById($this->id);

            $array = $employee->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->deleteObjectById($this->id);

            $array = $car->getAllAsObjects();
        }
        return $array;
    }
}
