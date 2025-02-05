<?php
namespace Core;
require_once __DIR__ . "/../vendor/autoload.php";


trait Twig {
    public function rander($template, $data = []) {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../views');
        $twig = new \Twig\Environment($loader);
        echo $twig->render($template, $data);
    }

}

