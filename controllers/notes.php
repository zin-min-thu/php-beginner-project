<?php

$config = require 'config.php';
// connect to our MySQL database
$db = new Database($config['database'], $config['dbuser'], $config['dbpassword']);
$heading = "My Notes";

$notes = $db->query('select * from notes where user_id = 1')->fetchAll();

// dd($notes);

require "views/notes.view.php";
