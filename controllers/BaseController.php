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
