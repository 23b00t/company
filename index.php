<?php

include 'config.php';

/**
 * Autoload classes
 */
spl_autoload_register(function ($className): void {
    include 'classes/' . $className . '.php';
});

/**
 * @var string $area (Controller Name)
 * default to employee if nothing is set
 * e.g. by a call of index.php without params (Homepage)
 */
$area = $_REQUEST['area'] ?? 'employee'; // $_REQUEST = $_GET and $_POST

/**
 * @var string $action (Controller action)
 * No default action means showTable because this is the default view
 */
$action = $_REQUEST['action'] ?? '';

/**
 * @var int $id
 * id of object handed over (or null if there is none)
 */
$id = $_REQUEST['id'] ?? null;

/**
 * @var string $view (view to render)
 * Default view
 */
$view = 'table';

/**
 * @var Employee[] $employees
 * @var Car[] $cars
 *
 * Initialize for default view
 */
$employees = (new Employee())->getAllAsObjects();
$cars = (new Car())->getAllAsObjects();

/**
 * Extract POST data
 */
// Get values employee
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$gender = $_POST['gender'] ?? '';
$salary = $_POST['salary'] ?? '';
// $salary = (float)$salary; // transform salary string to float
// get values car
$licensePlate = $_POST['licensePlate'] ?? '';
$manufacturer = $_POST['manufacturer'] ?? '';
$type = $_POST['type'] ?? '';

/**
 * @var array $data
 * Pack POST data in array
 */
$data = [
    'firstName' => $firstName,
    'lastName' => $lastName,
    'gender' => $gender,
    'salary' => $salary,
    'licensePlate' => $licensePlate,
    'manufacturer' => $manufacturer,
    'type' => $type
];

/** Build Action Controller from $action */
$controllerName = ucfirst($action) . 'Controller';

/** Initialize Action Controllers */
if ($action === 'showTable') {
    $array = (new $controllerName($area))->run();
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'showForm') {
    (new $controllerName($view, $action))->run();
} elseif ($action === 'showEdit') {
    $array = (new $controllerName($area, $id, $view, $action))->run();
    if ($area == 'employee') {
        $employee = $array;
    } elseif ($area === 'car') {
        $car = $array;
    }
} elseif ($action === 'delete') {
    $array = (new $controllerName($area, $id))->run();
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'insert') {
    $array = (new $controllerName($area, $data))->run();
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'update') {
    $array = (new $controllerName($area, $id, $data))->run();
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
}

/** Include requested view */
include 'views/' . $area . '/' . $view . '.php';
