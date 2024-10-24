<?php

/**
 * Class: DeleteController
 *
 */
class DeleteController implements IController
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
     * @var string $view
     */
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
     * @return array
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
        } elseif ($this->area === 'rental') {
            $rental = new Rental();
            $rental->deleteObjectById($this->id);

            $rentals = $rental->getAllAsObjects();
            $cars = (new Car())->getAllAsObjects();
            $employees = (new Employee())->getAllAsObjects();
            return [ 'rentals' => $rentals, 'cars' => $cars, 'employees' => $employees ];
        }
    }

    /**
     * getView
     *
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }
}
