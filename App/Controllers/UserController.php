<?php

namespace App\Controllers;

require_once __DIR__ ."/../../vendor/autoload.php";

use Core\Twig;
use App\Models\User;

class UserController
{
    use Twig;

    public function signUp($username, $email, $password) {
        $user = new User($id = null, $username, $email, $password);
        $msg = $user->signUp();
        if ($msg == "Message successful") {
            $this->render('home.twig', ['success' => 'Account created successfully!']);
        } else {
            $this->render('singup.twig', ['error' => $msg]);
        }
    }

    public function register() {
        $this->render('singup.twig');
    }
}
