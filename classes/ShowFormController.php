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
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        $this->area = $requestData['area'];
        $this->id = $requestData['id'] ?? null;
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
                return [ 'view' => 'form', 'action' => 'update', 'employee' => $employee ];
            } elseif ($this->area === 'car') {
                $car = (new Car())->getObjectById($this->id);
                return [ 'view' => 'form', 'action' => 'update', 'car' => $car ];
            }
        }
        return [ 'view' => 'form', 'action' => 'insert' ];
    }
}
