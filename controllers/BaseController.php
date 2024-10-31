<?php

/**
 * Class: BaseController
 *
 * @see IController
 * @abstract
 */
abstract class BaseController implements IController
{
    /**
     * @var string $area
     */
    protected string $area;
    /**
     * @var string $view
     */
    protected string $view;

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
            $this->employeeAction();
        } elseif ($this->area === 'car') {
            $this->carAction();
        } elseif ($this->area === 'rental') {
            $this->rentalAction();
        }
        return TableHelper::getAllObjectsByArea($this->area);
    }

    /**
     * employeeAction
     *
     * @return void
     */
    protected function employeeAction(): void
    {
    }

    /**
     * carAction
     *
     * @return void
     */
    protected function carAction(): void
    {
    }

    /**
     * rentalAction
     *
     * @return void
     */
    protected function rentalAction(): void
    {
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

    /**
     * setView
     *
     * @param string $view
     * @return void
     */
    public function setView(string $view): void
    {
        $this->view = $view;
    }
}
