<?php

/**
 * Class: UpdateController
 *
 */
class UpdateController extends BaseController
{
    /**
     * @var int $id
     */
    private int $id;
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
        $this->id = $requestData['id'];
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
            $employee = new Employee(
                $this->id,
                $this->postData['firstName'],
                $this->postData['lastName'],
                $this->postData['gender'],
                (float)$this->postData['salary']
            );
            $employee->update();
        } elseif ($this->area === 'car') {
            $car = new Car(
                $this->id,
                $this->postData['licensePlate'],
                $this->postData['manufacturer'],
                $this->postData['type']
            );
            $car->update();
        } elseif ($this->area === 'rental') {
            $rental = new Rental(
                $this->id,
                $this->postData['employeeId'],
                $this->postData['carId'],
                $this->postData['rentalFrom'],
                $this->postData['rentalTo']
            );
            $rental->update();
        }
        return TableHelper::getAllObjectsByArea($this->area);
    }
}
