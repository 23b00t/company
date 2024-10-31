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
    }

    /**
     * employeeAction
     *
     * @return void
     */
    protected function employeeAction(): void
    {
        $employee = new Employee(
            $this->id,
            $this->postData['firstName'],
            $this->postData['lastName'],
            $this->postData['gender'],
            (float)$this->postData['salary']
        );
        $employee->update();
    }

    /**
     * carAction
     *
     * @return void
     */
    protected function carAction(): void
    {
        $car = new Car(
            $this->id,
            $this->postData['licensePlate'],
            $this->postData['manufacturer'],
            $this->postData['type']
        );
        $car->update();
    }

    /**
     * rentalAction
     *
     * @return void
     */
    protected function rentalAction(): void
    {
        $rental = new Rental(
            $this->id,
            $this->postData['employeeId'],
            $this->postData['carId'],
            $this->postData['rentalFrom'],
            $this->postData['rentalTo']
        );
        $rental->update();
    }
}
