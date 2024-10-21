<?php

/**
 * Class: ShowFormController
 *
 */
class ShowFormController
{
    private string $area;
    private string $view;
    private ?int $id;

    /**
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
        if (isset($this->id)) {
            if ($this->area === 'employee') {
                return [(new Employee())->getObjectById($this->id)];
            } elseif ($this->area === 'car') {
                return [(new Car())->getObjectById($this->id)];
            }
        }
        return [];
    }
}
