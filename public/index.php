<?php

const BASE_PATH = __DIR__.'/../';

// var_dump(BASE_PATH);die;

require BASE_PATH .'Core/function.php';

spl_autoload_register(function($class) {
    # Core\Database == $class because we use namespace declaration type
    # find the neccessary class to use and declare
    // require base_path('Core/' .$class . '.php');
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('Core/router.php');
