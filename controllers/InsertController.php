<?php

/**
 * Class: InsertController
 */
class InsertController extends BaseController
{
    /**
     * @var array $postData
     */
    private array $postData;

    /**
     * __construct
     *
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        parent::__construct($requestData);
        // Extract object attribute values from POST requestData
        $this->postData = (new FilterData($requestData))->filter();
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
            $employee->insert(
                $this->postData['firstName'],
                $this->postData['lastName'],
                $this->postData['gender'],
                (float)$this->postData['salary']
            );
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->insert($this->postData['licensePlate'], $this->postData['manufacturer'], $this->postData['type']);
        } elseif ($this->area === 'rental') {
            $rental = new Rental();
            $rental->insert(
                $this->postData['employeeId'],
                $this->postData['carId'],
                $this->postData['rentalFrom'],
                $this->postData['rentalTo']
            );
        }
        return TableHelper::getAllObjectsByArea($this->area);
    }
}
