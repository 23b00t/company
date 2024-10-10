<?php
include 'config.php';
include "classes/Db.php";
include "classes/Mitarbeiter.php";

$action = $_GET['action'] ?? 'showTabelle';

// $monatslohn = $_POST['monatslohn'] ?? '0';

if ($action === 'showTabelle') {
    $view = 'tabelle';
} elseif ($action === 'showEingabe') {
    $view = 'eingabe';
}

include_once __DIR__ . '/views/' . $view . '.php';
