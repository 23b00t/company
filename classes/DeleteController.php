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

    private string $view;


    /**
     * __construct
     *
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        $this->area = $requestData['area'];
        $this->id = $requestData['id'];
        $this->view = 'table';
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
            return [ 'employees' => $employees ];
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->deleteObjectById($this->id);

            $cars = $car->getAllAsObjects();
            return [ 'cars' => $cars ];
        }
    }

    public function getView(): string
    {
        return $this->view;
    }
}
