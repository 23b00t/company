<?php

/**
 * Class: BaseController
 *
 * @see IController
 * @abstract
 */
abstract class BaseController
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
     * @var string $msg
     */
    protected string $msg;

    /**
     * __construct
     *
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        $this->area = $requestData['area'] ?? 'employee';
        $this->view = 'table';
        $this->msg = '';
    }

    /**
     * invoke
     *
     * @return array
     */
    public function invoke(): Response
    {
        try {
            if ($this->area === 'employee') {
                $this->employeeAction();
            } elseif ($this->area === 'car') {
                $this->carAction();
            } elseif ($this->area === 'rental') {
                $this->rentalAction();
            }
            $response = new Response(TableHelper::getAllObjectsByArea($this->area));
            $response->setMsg($this->msg);

            return $response;
        } catch (Throwable $e) {
            if ($e->getCode() === '23000') {
                $response = new Response(TableHelper::getAllObjectsByArea($this->area));
                $response->setMsg('Du kannst kein Objekt löschen, dass noch verwendet wird.');
                return $response;
            }
            throw new Exception($e);
        }
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
