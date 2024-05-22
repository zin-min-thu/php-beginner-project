<?php

use Core\Database;

$config = require base_path('config.php');
// connect to our MySQL database
$db = new Database($config['database'], $config['dbuser'], $config['dbpassword']);
$heading = "My Notes";

$notes = $db->query('select * from notes where user_id = 1')->get();

view("notes/index.view.php", [
    'heading' => $heading,
    'notes' => $notes
]);
