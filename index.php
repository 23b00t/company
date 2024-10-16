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
if ($area === 'employee') {
    // Get values
    $employees = (new Employee())->getAllAsObjects();
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $salary = $_POST['salary'] ?? '';
    $salary = (float)$salary; // transform salary string to float

    // default employee view
    $view = 'employee/table';

    if ($action === 'showForm') {
        // Dummy Employee for creation; gender pre-filled with w; same view for update;
        // make $action available in form to handle both, insert and update
        $employee = new Employee(null, '', '', 'w', null);
        $view = 'employee/form';
        $action = 'insert';
    } elseif ($action === 'delete') {
        (new Employee())->deleteObjectById($id);
        // (new Employee())->deleteObjectById(23);
        $employees = (new Employee())->getAllAsObjects();
    } elseif ($action === 'insert') {
        $employee = (new Employee())->insert($firstName, $lastName, $gender, $salary);
        // Get all objects including the newly created to include it in standard view
        $employees = (new Employee())->getAllAsObjects();
    } elseif ($action === 'showEdit') {
        $employee = (new Employee())->getObjectById($id);
        $view = 'employee/form';
        $action = 'update';
    } elseif ($action === 'update') {
        $employee = (new Employee($id, $firstName, $lastName, $gender, $salary))->update();
        // Get all objects including the updated to include it in standard view
        $employees = (new Employee())->getAllAsObjects();
    }
} elseif ($area === 'car') {
    // get values
    $cars = (new Car())->getAllAsObjects();
    $licensePlate = $_POST['licensePlate'] ?? '';
    $manufacturer = $_POST['manufacturer'] ?? '';
    $type = $_POST['type'] ?? '';

    // set default car view
    $view = 'car/table';

    if ($action === 'showForm') {
        // make $action available in form to handle both, insert and update
        $car = new Car(null, '', '', '');
        $view = 'car/form';
        $action = 'insert';
    } elseif ($action === 'delete') {
        (new Car())->deleteObjectById($id);
        // Test case for Error Handling: (new Car())->deleteObjectById(23);
        $cars = (new Car())->getAllAsObjects();
    } elseif ($action === 'insert') {
        $car = (new Car())->insert($licensePlate, $manufacturer, $type);
        $cars = (new Car())->getAllAsObjects();
    } elseif ($action === 'showEdit') {
        $car = (new Car())->getObjectById($id);
        $view = 'car/form';
        $action = 'update';
    } elseif ($action === 'update') {
        $car = (new Car($id, $licensePlate, $manufacturer, $type))->update();
        $cars = (new Car())->getAllAsObjects();
    }
}

/** Include requested view */
include __DIR__ . '/views/' . $view . '.php';
