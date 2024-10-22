<?php

interface IController
{
    /**
     * Constructor must accept an array parameter.
     *
     * @param array $data
     */
    public function __construct(array $data);

    /**
     * Invoke method must be implemented without arguments.
     *
     * @return array
     */
    public function invoke(): array;

    /**
     * getView
     *
     * @return string
     */
    public function getView(): string;
}
