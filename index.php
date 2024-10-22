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
 * @var string $view (view to render)
 * Default view
 */
$view = 'table';

/** Build Action Controller Name from $action */
$controllerName = ucfirst($action) . 'Controller';

/**
 * Invoke the controller and extract variables from the returned array
 * (e.g., 'view', 'employees') into the current scope for direct access
 * as $view, $employees, etc.
 */
$array = (new $controllerName($_REQUEST))->invoke();

extract($array);

/** Include requested view */
include 'views/' . $area . '/' . $view . '.php';
