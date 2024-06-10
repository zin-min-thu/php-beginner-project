<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die;
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die;
}

function authorize($condition, $status = Response::FORRIDDEN) {
    if(! $condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes); # will extract key, value vairable than can direct use in view

    require base_path('views/'. $path);
}

function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];

    session_destroy();

    $parans = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $parans['path'], $parans['domain'], $parans['secure'], $parans['httponly']);

}