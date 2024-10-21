<?php

/**
 * Class: ShowFormController
 *
 */
class ShowFormController
{
    /**
     * @var string $area
     */
    private string $area;
    /**
     * @var ?int $id
     */
    private ?int $id;

    /**
     * __construct
     *
     * @param string $area
     * @param string $view
     * @param ?int $id
     */
    public function __construct(string $area, string &$view, int $id = null)
    {
        $this->area = $area;
        $view = 'form';
        $this->id = $id;
    }

    /**
     * @return array<int,Employee>|array<int,Car>|array
     */
    public function invoke(): array
    {
        $array = [];
        if (isset($this->id)) {
            if ($this->area === 'employee') {
                $array = [(new Employee())->getObjectById($this->id)];
            } elseif ($this->area === 'car') {
                $array = [(new Car())->getObjectById($this->id)];
            }
        }
        return $array;
    }
}
