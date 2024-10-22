<?php

/**
 * Class: ShowTableController
 *
 */
class ShowTableController
{
    /**
     * @var string $area
     */
    private string $area;

    /**
     * __construct
     *
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        $this->area = $requestData['area'] ?? 'employee';
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
            return [ 'view' => 'table', 'employees' => $employees ];
        } elseif ($this->area === 'car') {
            $cars = (new Car())->getAllAsObjects();
            return [ 'view' => 'table', 'cars' => $cars ];
        }
    }
}
