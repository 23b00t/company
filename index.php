<?php

include 'config.php';
include "classes/Db.php";
include "classes/Mitarbeiter.php";

echo '<pre>';
// print_r(Mitarbeiter::getAllAsObjects());
print_r((new Mitarbeiter())->getAllAsObjects());
echo '</pre>';

$action = $_GET['action'] ?? 'showTabelle';

// $monatslohn = $_POST['monatslohn'] ?? '0';

if ($action === 'showTabelle') {
    $view = 'tabelle';
} elseif ($action === 'showEingabe') {
    $view = 'eingabe';
}

include __DIR__ . '/views/' . $view . '.php';
