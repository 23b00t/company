<?php

/**
 * IBasic
 * Interface for basic methods of Models
 */
interface IBasic
{
    /**
     * getAllAsObjects
     *
     * @return array
     */
    public function getAllAsObjects(): array;

    /**
     * deleteObjectById
     *
     * @param int $id
     * @return void
     */
    public function deleteObjectById(int $id): void;

    /**
     * getObjectById
     *
     * @param int $id
     * @return Object
     */
    public function getObjectById(int $id): object;

    /**
     * update
     *
     * @return void
     */
    public function update(): void;
}
