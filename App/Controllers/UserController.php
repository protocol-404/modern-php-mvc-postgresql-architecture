<?php

namespace App\Controllers;

require_once __DIR__ ."/../../vendor/autoload.php";

use Core\Twig;
use App\Models\User;

class UserController
{
    use Twig;

    public function singUp($username, $email, $password) {
        $user = new User($id = null, $username, $email, $password);
        $msg = $user->singUp();
        if ($msg == "Message successful") {
            $this->rander('home.twig', ['success' => 'Account created successfully!']);
        } else {
            $this->rander('signup.twig', ['error' => $msg]);
        }
    }

    public function register() {
        $this->rander('signup.twig');
    }
}
