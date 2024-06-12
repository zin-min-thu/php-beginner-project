<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email    = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email.';
}

if (!Validator::string($password, 5, 255)) {
    $errors['password'] = 'Password must be between 7 and 255 characters.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();

if ($user) {
    // if yes , redirect to login page
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email'    => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    login($user);

    header('location: /');
    exit();
}
