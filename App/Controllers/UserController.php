<?php

namespace App\Controllers;

require_once __DIR__ ."../../vendor/autoload.php";

use App\Models\User;

class UserController
{
    public function singUp($username, $email, $password) {
        $user = new User($id = null,$username, $email, $password);
        $msg = $user->singUp();

        if ($msg == "Message successful") {
            return $this->twig->render('views/home.twig', [
                'success' => 'Account created successfully!'
            ]);
        } else {
            return $this->twig->render('views/signup.twig', [
                'error' => $msg
            ]);
        }
        
    }
}
