<?php

<<<<<<< HEAD
/**
 * Interface: IController
 */
=======
>>>>>>> useGetters
interface IController
{
    /**
     * Constructor must accept an array parameter.
     *
<<<<<<< HEAD
     * @param array $requestData
     */
    public function __construct(array $requestData);
=======
     * @param array $data
     */
    public function __construct(array $data);
>>>>>>> useGetters

    /**
     * Invoke method must be implemented without arguments.
     *
     * @return array
     */
    public function invoke(): array;
<<<<<<< HEAD
=======

    /**
     * getView
     *
     * @return string
     */
    public function getView(): string;
>>>>>>> useGetters
}
