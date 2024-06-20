<?php

use Core\Session;
use Core\ValidationException;

session_start();

ini_set('display_errors', 1);
error_reporting(-1);

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/function.php';

spl_autoload_register(function ($class) {
    # Core\Database == $class because we use namespace declaration type
    # find the neccessary class to use and declare
    // require base_path('Core/' .$class . '.php');
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

// require base_path('Core/router.php');
$router = new \Core\Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}


Session::unflash();