<?php

include 'config.php';
include "classes/Db.php";
include "classes/Mitarbeiter.php";

echo '<pre>';
// // print_r(Mitarbeiter::getAllAsObjects());
// print_r((new Mitarbeiter())->getAllAsObjects());
// print_r($_GET);
echo '</pre>';

$employees = (new Mitarbeiter())->getAllAsObjects();

$action = $_GET['action'] ?? 'showTabelle';
$id = $_GET['id'] ?? '0';

// $monatslohn = $_POST['monatslohn'] ?? '0';

$view = 'tabelle';
if ($action === 'showTabelle') {
    $view = 'tabelle';
} elseif ($action === 'delete') {
    (new Mitarbeiter())->deleteObjectById($id);
    // (new Mitarbeiter())->deleteObjectById(23);
    $employees = (new Mitarbeiter())->getAllAsObjects();
    $view = 'tabelle';
} elseif ($action === 'showForm') {
    $view = 'form';
}

include __DIR__ . '/views/' . $view . '.php';
