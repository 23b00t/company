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
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->area = $data['area'];
        $this->id = $data['id'];
    }

    /**
     * invoke
     *
     * @return Employee[]|Car[]
     */
    public function invoke(): array
    {
        if ($this->area === 'employee') {
            $employee = new Employee();
            $employee->deleteObjectById($this->id);

            $employees = $employee->getAllAsObjects();
            return [ 'view' => 'table', 'employees' => $employees ];
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->deleteObjectById($this->id);

            $cars = $car->getAllAsObjects();
            return [ 'view' => 'table', 'cars' => $cars ];
        }
    }
}
