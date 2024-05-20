<?php

require('Validator.php');

$config = require 'config.php';

$db = new Database($config['database'], $config['dbuser'], $config['dbpassword']);

$heading = 'Note Create';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

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

require 'views/notes/create.view.php';