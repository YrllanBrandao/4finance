<?php
    require_once __DIR__ . '/../vendor/autoload.php';


    class Connection{
        public static function createConnection(){
            try{
                $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
                $dotenv->load();
                $dsn = $_ENV['DB_DSN'];
                $user = $_ENV['DB_ADMIN'];
                $password = $_ENV['DB_PASSWORD'];
                $connection = new PDO($dsn, $user, $password);
                
                return $connection;
               }
               catch(PROException $error){
                echo $error->getMessage();
               }
        }
    }
   
?>