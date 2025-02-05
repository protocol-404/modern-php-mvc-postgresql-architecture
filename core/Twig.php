<?php
namespace Core;
require_once __DIR__ . "/../vendor/autoload.php";
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

trait Twig {
    public function render($template, $data = []) {
        $loader = new FilesystemLoader(__DIR__ . '/../App/Views');
        $twig = new Environment($loader, [
            'cache' => __DIR__ . '/../cache/twig',
            'auto_reload' => true,
        ]);
        echo $twig->render($template, $data);
    }
}

