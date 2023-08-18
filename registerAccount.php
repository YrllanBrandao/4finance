<?php   
    require_once './vendor/autoload.php';
    session_start();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    use database\Connection;


    try{
        $connection = Connection::createConnection();


        if(!empty($username) && !empty($email) && !empty($password))
        {
            $query =  '
                INSERT INTO users(username, email, password) values(:username, :email, :password)
            ';

            $statement = $connection->prepare($query);

            $statement -> bindParam(':username', $username);
            $statement -> bindParam(':email', $email);
            $statement -> bindParam(':password', $password);

            $statement->execute();

            $_SESSION['user'] = $username;
            $_SESSION['authenticated'] = true;

            header("location: home.php");

        }
        else{
            throw new Exception("invalid values");
        }
    }
    catch(Exception $error)
    {
        header('location: createAccount.php?error=500&message=');
    }
    