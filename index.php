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

/** Build Action Controller from $action */
$controllerName = ucfirst($action) . 'Controller';

$objectArrayName = $area . 's';
$objectName = $area;

/** Initialize Action Controllers */
if ($action === 'showForm') {
    $array = (new $controllerName($area, $view, $id))->invoke();
    $$objectName = $array[0] ?? [];
    $action = isset($id) ? 'update' : 'insert';
} elseif ($action === 'delete') {
    $array = (new $controllerName($area, $view, $id))->invoke();
} elseif ($action === 'insert') {
    $data = (new FilterData($_POST))->filter();
    $array = (new $controllerName($area, $view, $data))->invoke();
} elseif ($action === 'update') {
    $data = (new FilterData($_POST))->filter();
    $array = (new $controllerName($area, $view, $id, $data))->invoke();
} else { //($action === 'showTable')
    $array = (new $controllerName($area, $view))->invoke();
}

$$objectArrayName = $array ?? [];

/** Include requested view */
include 'views/' . $area . '/' . $view . '.php';
