<?php
    session_start();
    $authenticated = isset($_SESSION['authenticated']);
    if($authenticated)
    {
        header("location: home.php");
    }
?>