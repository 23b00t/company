<?php

/**
 * Class TableHelper
 */
class TableHelper
{
    /**
     * getAllObjectsByArea
     *
     * @param string $area
     * @return array
     */
    public static function getAllObjectsByArea(string $area): array
    {
        if ($area === 'employee') {
            $employees = (new Employee())->getAllAsObjects();
            return [ 'employees' => $employees ];
        } elseif ($area === 'car') {
            $cars = (new Car())->getAllAsObjects();
            return [ 'cars' => $cars ];
        } elseif ($area === 'rental') {
            $rentals = (new Rental())->getAllAsObjects();
            return [ 'rentals' => $rentals ];
        }
    }
}
