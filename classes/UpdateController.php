<?php

/**
 * Class: UpdateController
 *
 */
class UpdateController implements IController
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

            $employees = $employee->getAllAsObjects();
            return [ 'employees' => $employees ];
        } elseif ($this->area === 'car') {
            $car = new Car(
                $this->id,
                $this->postData['licensePlate'],
                $this->postData['manufacturer'],
                $this->postData['type']
            );
            $car->update();

            $cars =  $car->getAllAsObjects();
            return [ 'cars' => $cars ];
        }
    }

    public function getView(): string
    {
        return $this->view;
    }
}
