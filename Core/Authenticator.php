<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query('select * from users where email = :email', [
                'email' => $email,
            ])->find();

        if ($user) {
            # verify password
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                ]);
                return true;
            }
        }
        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        $_SESSION = [];

        session_destroy();

        $parans = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $parans['path'], $parans['domain'], $parans['secure'], $parans['httponly']);
    }
}
