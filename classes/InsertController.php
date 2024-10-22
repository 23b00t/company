<?php

/**
 * Class: InsertController
 */
class InsertController
{
    /**
     * @var string $area
     */
    private string $area;
    /**
     * @var array $postData
     */
    private array $postData;

    private string $view;

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
            $employee->insert(...$this->postData);

            $employees = $employee->getAllAsObjects();
            return [ 'employees' => $employees ];
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->insert(...$this->postData);

            $cars = $car->getAllAsObjects();
            return [ 'cars' => $cars ];
        }
    }

    public function getView(): string
    {
        return $this->view;
    }
}
