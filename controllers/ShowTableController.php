<?php

/**
 * Class: ShowTableController
 *
 */
class ShowTableController extends BaseController
{
    /**
     * @param array $requestData
     */
    public function __construct(array $requestData)
    {
        parent::__construct($requestData);
        $this->view = 'table';
    }

    /**
     * invoke
     *
     * @return array
     */
    public function invoke(): array
    {
        return TableHelper::getAllObjectsByArea($this->area);
    }
}
