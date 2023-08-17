<?php
    require_once '../vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
    $dsn = $_ENV['DB_DSN'];
    $user = $_ENV['DB_ADMIN'];
    $password = $_ENV['DB_PASSWORD'];
    $connection = new PDO($dsn, $user, $password);
?>