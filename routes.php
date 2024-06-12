<?php

// return [
//     '/'        => 'index.php',
//     '/about'   => 'about.php',
//     '/notes'   => 'notes/index.php',
//     '/notes/create'   => 'notes/create.php',
//     '/note'    => 'notes/show.php',
//     '/contact' => 'contact.php',
// ];

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');
$router->get('/note', 'notes/show.php');
$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');
$router->delete('/note', 'notes/destroy.php');

#Register Routes
$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');

#Login & Logout Routes
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
