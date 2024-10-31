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

    protected function employeeAction(): void
    {
        (new Employee())->insert(
            $this->postData['firstName'],
            $this->postData['lastName'],
            $this->postData['gender'],
            (float)$this->postData['salary']
        );
    }

    protected function carAction(): void
    {
        (new Car())->insert(
            $this->postData['licensePlate'],
            $this->postData['manufacturer'],
            $this->postData['type']
        );
    }

    protected function rentalAction(): void
    {
        (new Rental())->insert(
            $this->postData['employeeId'],
            $this->postData['carId'],
            $this->postData['rentalFrom'],
            $this->postData['rentalTo']
        );
    }
}
