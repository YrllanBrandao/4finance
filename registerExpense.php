<?php

    require_once './vendor/autoload.php';
    session_start();
    $owner = $_SESSION['userId'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $value = $_POST['value'];
    $description = $_POST['description'];

    use database\Connection;


    try{
        $connection = Connection::createConnection();

        $query = '
    INSERT INTO expenses (title, date, type, value, description, owner_id)
    VALUES (:title, :date, :type, :value, :description, :owner_id)
        ';

        $statement = $connection->prepare($query);

        $statement->bindParam(':title', $title);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':type', $type);
        $statement->bindParam(':value', $value);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':owner_id', $owner);

        $statement->execute();

        header("location: expenses.php");

    }
    catch(PDOException $error)
    {   
        $errorMessage = $error -> getMessage();
        echo $errorMessage;
    }    
?>