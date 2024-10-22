<?php

/**
 * Class: UpdateController
 *
 */
class UpdateController
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
        $this->id = $requestData['id'];
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
            $employee = new Employee($this->id, ...$this->postData);
            $employee->update();

            $employees = $employee->getAllAsObjects();
            return [ 'view' => 'table', 'employees' => $employees ];
        } elseif ($this->area === 'car') {
            $car = new Car($this->id, ...$this->postData);
            $car->update();

            $cars =  $car->getAllAsObjects();
            return [ 'view' => 'table', 'cars' => $cars ];
        }
    }
}
