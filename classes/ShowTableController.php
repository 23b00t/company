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

    private ?array $requestData;


    /**
     * __construct
     *
     * @param string $area
     * @param string $view
     * @param array<int,mixed> $requestData
     */
    public function __construct(string $area, string &$view)
    {
        $this->area = $area;
        $view = 'table';
    }

    /**
     * @return Employee[]|Car[]
     */
    public function invoke(): array
    {
        $array = [];
        if ($this->area === 'employee') {
            $array = (new Employee())->getAllAsObjects();
        } elseif ($this->area === 'car') {
            $array = (new Car())->getAllAsObjects();
        }
        return $array;
    }
}
