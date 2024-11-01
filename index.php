<?php

/**
 * index.php
 * Handle all application requests
 */

try {
    /** Include DB config */
    include 'config.php';

    /** Autoload classes */
    spl_autoload_register(function ($className): void {
        if (substr($className, -10) === 'Controller') {
            include 'controllers/' . $className . '.php';
        } else {
            include 'classes/' . $className . '.php';
        }
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

    /** After calling ShowFormController set the action depending on usecase - update or insert */
    $action = $controllerName === 'ShowFormController' ? $controller->getAction() : $action;

    /** Include requested view */
    include __DIR__ . '/views/application.html.php';
} catch (Exception $e) {
    include __DIR__ . '/views/error.php';
}
