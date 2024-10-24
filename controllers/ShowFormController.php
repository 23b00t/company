<?php

/**
 * Class: ShowFormController
 *
 */
class ShowFormController implements IController
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
     * @var string $view
     */
    private string $view;
    /**
     * @var string $action
     */
    private string $action;

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
        $this->action = 'insert';
    }

    /**
     * invoke
     *
     * @return array
     */
    public function invoke(): array
    {
        $array = [];
        /** Show edit form with pre-filled fields */
        if (isset($this->id)) {
            $this->action = 'update';
            if ($this->area === 'employee') {
                $employee = (new Employee())->getObjectById($this->id);
                $array = [  'employee' => $employee ];
            } elseif ($this->area === 'car') {
                $car = (new Car())->getObjectById($this->id);
                $array = [ 'car' => $car ];
            } elseif ($this->area === 'rental') {
                $rental = (new Rental())->getObjectById($this->id);
                $array = [ 'rental' => $rental ];
            }
        }
        return $array;
    }

    public function getView(): string
    {
        return $this->view;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}
