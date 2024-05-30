<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database'], $config['dbuser'], $config['dbpassword']);

});

App::setContainer($container);

// $db = $container->resolve('Core\Database');

// $container->resolve('sladflk'); # if have no key will throw error
