<?php

/**
 * Class: ShowTableController
 *
 */
class ShowTableController implements IController
{
    /**
     * @var string $area
     */
    private string $area;

    private string $view;


    /**
     * __construct
     *
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        $this->area = $requestData['area'] ?? 'employee';
        $this->view = 'table';
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
            return [ 'employees' => $employees ];
        } elseif ($this->area === 'car') {
            $cars = (new Car())->getAllAsObjects();
            return [ 'cars' => $cars ];
        } elseif ($this->area === 'rental') {
            $rentals = (new Rental())->getAllAsObjects();
            return [ 'rentals' => $rentals ];
        }
    }

    public function getView(): string
    {
        return $this->view;
    }
}
