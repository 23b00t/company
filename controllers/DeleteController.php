<?php

/**
 * Class: DeleteController
 *
 */
class DeleteController extends BaseController
{
    /**
     * @var int $id
     */
    private int $id;

    /**
     * __construct
     *
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        parent::__construct($requestData);
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
            return [ 'rentals' => $rentals ];
        }
    }
}
