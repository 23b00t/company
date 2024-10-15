<?php

include 'config.php';
include "classes/Db.php";
include "classes/Employee.php";
include 'classes/Car.php';

echo '<pre>';
// // print_r(Employee::getAllAsObjects());
// print_r((new Employee())->getAllAsObjects());
// print_r($_GET);
// print_r($_POST);
echo '</pre>';

$employees = (new Employee())->getAllAsObjects();
$cars = (new Car())->getAllAsObjects();

// $_REQUEST = $_GET und $_POST
$action = $_REQUEST['action'] ?? 'showTabelle';
$area = $_REQUEST['area'] ?? 'employee';
$id = $_REQUEST['id'] ?? null;

$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$gender = $_POST['gender'] ?? '';
$salary = $_POST['salary'] ?? '';
$salary = (float)$salary;

$licensePlate = $_POST['licensePlate'] ?? '';
$manufacturer = $_POST['manufacturer'] ?? '';
$type = $_POST['type'] ?? '';

// default view if no area is set
$view = 'employee/tabelle';

if ($area === 'employee') {
    $view = 'employee/tabelle';
    if ($action === 'showForm') {
        // Dummy Employee for creation; gender prefilled with w; same view for update;
        // id = 0 to handle in view difference between insert und update
        $employee = new Employee(null, '', '', 'w', null);
        $view = 'employee/form';
    } elseif ($action === 'delete') {
        (new Employee())->deleteObjectById($id);
        // (new Employee())->deleteObjectById(23);
        $employees = (new Employee())->getAllAsObjects();
    } elseif ($action === 'insert') {
        $employee = (new Employee())->insert($firstName, $lastName, $gender, $salary);
        $employees = (new Employee())->getAllAsObjects();
    } elseif ($action === 'showEdit') {
        $employee = (new Employee())->getObjectById($id);
        $view = 'employee/form';
    } elseif ($action === 'update') {
        $employee = (new Employee($id, $firstName, $lastName, $gender, $salary))->update();
        $employees = (new Employee())->getAllAsObjects();
    }
} elseif ($area === 'car') {
    $view = 'car/tabelle';
    if ($action === 'showForm') {
        // Dummy Car for creation; gender prefilled with w; same view for update;
        // id = 0 to handle in view difference between insert und update
        $car = new Car(null, '', '', '');
        $view = 'car/form';
    } elseif ($action === 'delete') {
        (new Car())->deleteObjectById($id);
        // (new Car())->deleteObjectById(23);
        $cars = (new Car())->getAllAsObjects();
    } elseif ($action === 'insert') {
        $car = (new Car())->insert($licensePlate, $manufacturer, $type);
        $cars = (new Car())->getAllAsObjects();
    } elseif ($action === 'showEdit') {
        $car = (new Car())->getObjectById($id);
        $view = 'car/form';
    } elseif ($action === 'update') {
        $car = (new Car($id, $licensePlate, $manufacturer, $type))->update();
        $cars = (new Car())->getAllAsObjects();
    }
}

include __DIR__ . '/views/' . $view . '.php';
