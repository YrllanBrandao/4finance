<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

   require_once  './vendor/autoload.php';
   
   
   use database\Connection;

   

  try {

   $email = filter_var($_POST['email']);
   $password = $_POST['password'];
   $connection  = Connection::createConnection();
   $query = '
         select * from users where email = :email 
   ';
   $statement = $connection->prepare($query);
   $statement->bindValue(':email', $email);


   $statement->execute();


   $user = $statement->fetch(PDO::FETCH_ASSOC);

   if ($user) {
      if(password_verify($password, $user['password']))
      {
         session_start();
         $_SESSION['user'] = $user['username'];
         $_SESSION['userId'] = $user['id'];
         $_SESSION['authenticated'] = true;
         header("location: home.php");
      }
      else{
         header("location: index.php?error=400");
      }
   } else {
       header("location: index.php?error=404");
   }
} catch (PDOException $e) {
   header("location: index.php?error=500");
}


?>