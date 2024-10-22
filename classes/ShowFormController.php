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

    private string $view;

    /**
     * __construct
     *
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        $this->area = $requestData['area'];
        $this->id = $requestData['id'] ?? null;
        $this->view = 'form';
    }

    /**
     * invoke
     *
     * @return array
     */
    public function invoke(): array
    {
        if (isset($this->id)) {
            if ($this->area === 'employee') {
                $employee = (new Employee())->getObjectById($this->id);
                return [  'employee' => $employee, 'action' => 'update' ];
            } elseif ($this->area === 'car') {
                $car = (new Car())->getObjectById($this->id);
                return [ 'car' => $car, 'action' => 'update' ];
            }
        }
        return [ 'action' => 'insert' ];
    }

    public function getView(): string
    {
        return $this->view;
    }
}
