<?php

$config = require 'config.php';

$db = new Database($config['database'], $config['dbuser'], $config['dbpassword']);

$heading = 'Note Create';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    if(strlen($_POST['body']) == 0) {
        $errors['body'] = 'Body field is required.';
    }

    if(strlen($_POST['body']) > 100) {
        $errors['body'] = 'Body must not be exceed more than 100 characters.';
    }

    if(empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

}

require 'views/note-create.view.php';