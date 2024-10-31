<?php

/**
 * Class: ShowTableController
 *
 */
class ShowTableController extends BaseController
{
    /**
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        parent::__construct($requestData);
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
            $employees = (new Employee())->getAllAsObjects();
            return [ 'employees' => $employees ];
        } elseif ($this->area === 'car') {
            $cars = (new Car())->getAllAsObjects();
            return [ 'cars' => $cars ];
        } elseif ($this->area === 'rental') {
            $rentals = (new Rental())->getAllAsObjects();
            return [ 'rentals' => $rentals ];
        }
    }
}
