<?php

/**
 * index.php
 * Handle all application requests
 */

try {
    // NOTE: https://stackoverflow.com/questions/1241728/can-i-try-catch-a-warning
    set_error_handler(function ($errno, $errstr, $errfile, $errline) {
        // error was suppressed with the @-operator
        if (0 === error_reporting()) {
            return false;
        }

        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    });
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
    $response = $controller->invoke();

    $msg = $response->getMsg() ?? '';
    /** Get associative array of Object(s) from Response and extract it */
    $objects = $response->getArray() ?? [];
    extract($objects);

    $action = empty($response->getAction()) ? $action : $response->getAction();

    $view = $controller->getView();
} catch (Throwable $e) {
    // Write log file
    $timestamp = (new DateTime())->format('Y-m-d H:i:s ');
    file_put_contents(LOG_PATH, $timestamp . $e->getMessage() . "\n", FILE_APPEND);
    $area = 'error';
    $view = 'message';
    $msg = '';
} finally {
    /** Include requested view */
    include __DIR__ . '/views/application.html.php';
}
