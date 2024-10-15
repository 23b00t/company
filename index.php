<?php

include 'config.php';
include "classes/Db.php";
include "classes/Mitarbeiter.php";
include 'classes/Auto.php';

echo '<pre>';
// // print_r(Mitarbeiter::getAllAsObjects());
// print_r((new Mitarbeiter())->getAllAsObjects());
// print_r($_GET);
// print_r($_POST);
echo '</pre>';

$employees = (new Mitarbeiter())->getAllAsObjects();
$cars = (new Auto())->getAllAsObjects();

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

// $monatslohn = $_POST['monatslohn'] ?? '0';

if ($area === 'employee') {
    $view = 'mitarbeiter/tabelle';
    if ($action === 'showForm') {
        // Dummy Mitarbeiter for creation; gender prefilled with w; same view for update;
        // id = 0 to handle in view difference between insert und update
        $employee = new Mitarbeiter(null, '', '', 'w', null);
        $view = 'mitarbeiter/form';
    } elseif ($action === 'delete') {
        (new Mitarbeiter())->deleteObjectById($id);
        // (new Mitarbeiter())->deleteObjectById(23);
        $employees = (new Mitarbeiter())->getAllAsObjects();
    } elseif ($action === 'insert') {
        $employee = (new Mitarbeiter())->insert($firstName, $lastName, $gender, $salary);
        $employees = (new Mitarbeiter())->getAllAsObjects();
    } elseif ($action === 'showEdit') {
        $employee = (new Mitarbeiter())->getObjectById($id);
        $view = 'mitarbeiter/form';
    } elseif ($action === 'update') {
        $employee = (new Mitarbeiter($id, $firstName, $lastName, $gender, $salary))->update();
        $employees = (new Mitarbeiter())->getAllAsObjects();
    }
} elseif ($area === 'car') {
    $view = 'auto/tabelle';
    if ($action === 'showForm') {
        // Dummy Auto for creation; gender prefilled with w; same view for update;
        // id = 0 to handle in view difference between insert und update
        $car = new Auto(null, '', '', '');
        $view = 'auto/form';
    } elseif ($action === 'delete') {
        (new Auto())->deleteObjectById($id);
        // (new Auto())->deleteObjectById(23);
        $cars = (new Auto())->getAllAsObjects();
    } elseif ($action === 'insert') {
        $car = (new Auto())->insert($licensePlate, $manufacturer, $type);
        $cars = (new Auto())->getAllAsObjects();
    } elseif ($action === 'showEdit') {
        $car = (new Auto())->getObjectById($id);
        $view = 'auto/form';
    } elseif ($action === 'update') {
        $car = (new Auto($id, $licensePlate, $manufacturer, $type))->update();
        $cars = (new Auto())->getAllAsObjects();
    }
}

include __DIR__ . '/views/' . $view . '.php';
