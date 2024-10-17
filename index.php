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
 * Based on $area route to requested controller
 * removed in both areas action showTable because table is the default view
 *
 * @var string $view (view to render)
 */

// Get values
$employees = (new Employee())->getAllAsObjects();
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$gender = $_POST['gender'] ?? '';
$salary = $_POST['salary'] ?? '';
// $salary = (float)$salary; // transform salary string to float
// get values
$cars = (new Car())->getAllAsObjects();
$licensePlate = $_POST['licensePlate'] ?? '';
$manufacturer = $_POST['manufacturer'] ?? '';
$type = $_POST['type'] ?? '';

$data = [
    'firstName' => $firstName,
    'lastName' => $lastName,
    'gender' => $gender,
    'salary' => $salary,
    'licensePlate' => $licensePlate,
    'manufacturer' => $manufacturer,
    'type' => $type
];

$view = 'table';
if ($action === 'showTable') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area);
    $array = $controller->run();
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'showForm') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($view, $action);
    $controller->run();
} elseif ($action === 'showEdit') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $id, $view, $action);
    $array = $controller->run();
    if ($area == 'employee') {
        $employee = $array;
    } elseif ($area === 'car') {
        $car = $array;
    }
} elseif ($action === 'delete') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $id);
    $array = $controller->run();
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'insert') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $data);
    $array = $controller->run();
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'update') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $id, $data);
    $array = $controller->run();
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
}

/** Include requested view */
include 'views/' . $area . '/' . $view . '.php';
