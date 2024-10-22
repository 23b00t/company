<?php

/**
 * Class: InsertController
 *
 */
class InsertController
{
    /**
     * @var string $area
     */
    private string $area;
    /**
     * @var array $data
     */
    private array $data;


    /**
     * __construct
     *
     * @param string $area
     * @param string $view
     * @param array<int,mixed> $data
     */
    public function __construct(string $area, string &$view, array $data)
    {
        $this->area = $area;
        $view = 'table';
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function invoke(): array
    {
        $array = [];
        if ($this->area === 'employee') {
            $employee = new Employee();
            $employee->insert(...$this->data);

            $array = $employee->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $car = new Car();
            $car->insert(...$this->data);

            $array = $car->getAllAsObjects();
        }
        return $array;
    }
}
