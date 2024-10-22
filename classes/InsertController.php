<?php

/**
 * Class: InsertController
 */
class InsertController implements IController
{
    /**
     * @var string $area
     */
    private string $area;
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
        $this->area = $requestData['area'];
        // Extract object attribute values from POST requestData
        $this->postData = (new FilterData($requestData))->filter();
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

            $employees = $employee->getAllAsObjects();
            return [ 'view' => 'table', 'employees' => $employees ];
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->insert($this->postData['licensePlate'], $this->postData['manufacturer'], $this->postData['type']);

            $cars = $car->getAllAsObjects();
            return [ 'view' => 'table', 'cars' => $cars ];
        }
    }
}
