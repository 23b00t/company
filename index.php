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
 * showTable as default action
 */
$action = $_REQUEST['action'] ?? 'showTable';

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

/** Build Action Controller Name from $action */
$controllerName = ucfirst($action) . 'Controller';

/** Initialize Action Controllers */
if ($action === 'showForm') {
    $array = (new $controllerName($area, $view, $id))->invoke();
} elseif ($action === 'delete') {
    $array = (new $controllerName($area, $view, $id))->invoke();
} elseif ($action === 'insert') {
    // Hand POST array to FilterData to get back an array with the attributes of the calling area
    $data = (new FilterData($_POST))->filter();
    $array = (new $controllerName($area, $view, $data))->invoke();
} elseif ($action === 'update') {
    $data = (new FilterData($_POST))->filter();
    $array = (new $controllerName($area, $view, $id, $data))->invoke();
} else { //($action === 'showTable')
    $array = (new $controllerName($area, $view))->invoke();
}

/**
 * Assign to object array variable (e.g. $cars) or single object variable (e.g. $car) the data
 * returned by the controller, or an emplty array if there is no data (inital call to index.php).
 */
if ($view === 'table') {
    $objectArrayName = $area . 's'; // Set dynamic variable name for arrays of objects
    $$objectArrayName = $array ?? [];
} elseif ($view === 'form') {
    $objectName = $area; // Set dynamic variable name for object
    $$objectName = $array[0] ?? [];
    // Check if $id is set, which means that the edit form is displayed and the next action is update
    $action = isset($id) ? 'update' : 'insert';
}

/** Include requested view */
include 'views/' . $area . '/' . $view . '.php';
