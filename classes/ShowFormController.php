<?php

/**
 * Class: ShowFormController
 *
 */
class ShowFormController
{
    private string $view;
    private string $action;


    /**
     * @param string $view
     * @param string $action
     */
    public function __construct(string &$view, string &$action)
    {
        $this->view = &$view;
        $this->action = &$action;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        $this->view = 'form';
        $this->action = 'insert';
    }
}
