<?php

$config = require 'config.php';
// connect to our MySQL database
$db = new Database($config['database'], $config['dbuser'], $config['dbpassword']);
$heading = "Note";

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetch();

require "views/note.view.php";
