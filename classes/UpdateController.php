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
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->area = $data['area'];
        $this->id = $data['id'];
        $this->postData = (new FilterData($data))->filter();
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
