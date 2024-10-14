<?php

include 'config.php';
include "classes/Db.php";
include "classes/Mitarbeiter.php";

echo '<pre>';
// // print_r(Mitarbeiter::getAllAsObjects());
// print_r((new Mitarbeiter())->getAllAsObjects());
// print_r($_GET);
// print_r($_POST);
echo '</pre>';

$employees = (new Mitarbeiter())->getAllAsObjects();

// $_REQUEST = $_GET und $_POST
$action = $_REQUEST['action'] ?? 'showTabelle';
$id = $_GET['id'] ?? '0';

$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$gender = $_POST['gender'] ?? '';
$salary = $_POST['salary'] ?? '';

// $monatslohn = $_POST['monatslohn'] ?? '0';

$view = 'tabelle';
if ($action === 'showTabelle') {
    $view = 'tabelle';
} elseif ($action === 'showForm') {
    $view = 'form';
} elseif ($action === 'delete') {
    (new Mitarbeiter())->deleteObjectById($id);
    // (new Mitarbeiter())->deleteObjectById(23);
    $employees = (new Mitarbeiter())->getAllAsObjects();
    $view = 'tabelle';
} elseif ($action = 'insert') {
    $employee = (new Mitarbeiter())->insert($firstName, $lastName, $gender, $salary);
    $employees = (new Mitarbeiter())->getAllAsObjects();
}

include __DIR__ . '/views/' . $view . '.php';
