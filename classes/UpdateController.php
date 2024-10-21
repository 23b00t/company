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
     * @var array<int,mixed>
     */
    private array $data;

    /**
     * __construct
     *
     * @param string $area
     * @param string $view
     * @param int $id
     * @param array<int,mixed> $data
     */
    public function __construct(string $area, string &$view, int $id, array $data)
    {
        $this->area = $area;
        $view = 'table';
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function invoke(): array
    {
        $array = [];
        if ($this->area === 'employee') {
            $employee = new Employee($this->id, ...$this->data);
            $employee->update();

            $array = $employee->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $car = new Car($this->id, ...$this->data);
            $car->update();

            $array =  $car->getAllAsObjects();
        }
        return $array;
    }
}
