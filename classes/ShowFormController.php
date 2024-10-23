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

    private string $view;

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
                $cars = (new Car())->getAllAsObjects();
                $employees = (new Employee())->getAllAsObjects();
                $array = [ 'rental' => $rental, 'cars' => $cars, 'employees' => $employees ];
            }
        } else {
            if ($this->area === 'rental') {
                $cars = (new Car())->getAllAsObjects();
                $employees = (new Employee())->getAllAsObjects();
                $array = [ 'cars' => $cars, 'employees' => $employees ];
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
