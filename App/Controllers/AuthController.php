<?php
namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function login()
    {
        $error = '';

        if ($_POST) {
            $user = User::where('email', $_POST['email'])->first();
            if ($user && password_verify($_POST['password'], $user->password)) {
                $_SESSION['user_id'] = $user->id;
               header('Location: ' . BASE_URL . '/dashboard');

                exit;
            }
            $error = 'Credenciales incorrectas';
        }

        require 'app/Views/login.php';
    }

    public function register()
    {
        if ($_POST) {
            User::create([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
            ]);
            header('Location: ' . BASE_URL . '/login');

            exit;
        }
        require 'app/Views/register.php';
    }

    public function logout()
    {
        session_destroy();
       header('Location: ' . BASE_URL . '/login');

    }
}
