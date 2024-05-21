<?php

const BASE_PATH = __DIR__.'/../';

// var_dump(BASE_PATH);die;

require BASE_PATH .'function.php';

spl_autoload_register(function($class) {
    # find the neccessary class to use and declare
    // require base_path('Core/' .$class . '.php');
    require base_path("Core/{$class}.php");
});

require base_path('router.php');
