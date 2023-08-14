<?php

    session_start();
    $owner = $_SESSION['user'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $expense = $_POST['expense'];
    $description = $_POST['description'];

    $data =  $owner . '#' . $title . '#' . $date . '#' . $type . '#' . $expense . '#' . $description . PHP_EOL;


    $expense_file = fopen("expenses.ex", 'a');


    fwrite($expense_file, $data);
    fflush($expense_file);
    fclose($expense_file);

    header('location: expenses.php');
?>