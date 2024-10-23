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
$area = $_REQUEST['area'] ?? 'employee';

/**
 * @var string $action (Controller action)
 * showTable as default action
 */
$action = $_REQUEST['action'] ?? 'showTable';

/** Build Action Controller Name from $action */
$controllerName = ucfirst($action) . 'Controller';

/**
 * Determine request method (POST or GET) and securely pass the corresponding
 * data ($_POST or $_GET) to the controller, ensuring proper handling of input.
 */
$data = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : $_GET;

/**
 * Invoke the controller and extract variables from the returned array
 * (e.g., 'view', 'employees') into the current scope for direct access
 * as $view, $employees, etc.
 */
$controller = new $controllerName($data);

$array = $controller->invoke();

extract($array);

// $variableName = array_key_first($array);
// isset($array[$variableName]) && $$variableName = $array[$variableName];

$action = method_exists($controller, 'getAction') ? $controller->getAction() : $action;

/** Include requested view */
include 'views/' . $area . '/' . $controller->getView() . '.php';
