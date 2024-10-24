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
    /**
     * @var string $view
     */
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
            $cars = (new Car())->getAllAsObjects();
            $employees = (new Employee())->getAllAsObjects();
            return [ 'rentals' => $rentals, 'cars' => $cars, 'employees' => $employees ];
        }
    }

    /**
     * getView
     *
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }
}
