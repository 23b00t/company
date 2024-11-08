<?php

/**
 * Class Response
 */
class Response
{
    /**
     * @var array $array
     * Contains array of objects or a single object
     */
    private array $array = [];
    /**
     * @var string $msg
     */
    private string $msg = '';
    /**
     * @var string $action
     */
    private string $action = '';

    /**
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * getArray
     *
     * @return array
     */
    public function getArray(): array
    {
        return $this->array;
    }

    /**
     * getMsg
     *
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * getAction
     *
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * setMsg
     *
     * @param string $msg
     * @return void
     */
    public function setMsg(string $msg): void
    {
        $this->msg = $msg;
    }

    /**
     * setAction
     *
     * @param string $action
     * @return void
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }
}
