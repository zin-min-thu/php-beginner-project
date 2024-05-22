<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');

$db = new Database($config['database'], $config['dbuser'], $config['dbpassword']);

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(! Validator::string($_POST['body'], 1, 100)) {
        $errors['body'] = 'Body must not be exceed more than 100 characters.';
    }

    if(empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

}

view('notes/create.view.php', [
    'heading' => 'Note Create',
    'errors' => $errors,
]);