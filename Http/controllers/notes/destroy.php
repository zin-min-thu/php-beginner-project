<?php

use Core\App;
use Core\Database;

// use Core\Database;
// $config = require base_path('config.php');
// $db = new Database($config['database'], $config['dbuser'], $config['dbpassword']);

// $db = App::container()->resolve('Core\Database'); # first way
$db = App::resolve(Database::class); # second way

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] == $currentUserId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db->query('delete from notes where id = :id', [
        'id' => $_POST['id'],
    ]);

    header('location: /notes');
    exit();
}

view("notes/show.view.php", [
    'heading' => 'Note',
    'note'    => $note,
]);
