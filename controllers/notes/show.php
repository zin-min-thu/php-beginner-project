<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database'], $config['dbuser'], $config['dbpassword']);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrFail();


// if ($note['user_id'] != $currentUserId) {
//     abort(Response::FORRIDDEN);
// }

authorize($note['user_id'] == $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
