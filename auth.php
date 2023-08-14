<?php 
    session_start();
    $admin = ['username' => 'admin', "email" => "test@test.com", "password" => "123456"];
    $guest = ['username' => 'Yrllan' , 'email' => "test2@test.com", "password" => '123456'];


    $accounts = [$admin, $guest];


    $email = $_POST['email'];
    $password = $_POST['password'];

    foreach($accounts as $account){

        $matched = false;
        if($email === $account['email'])
        {
            if($password === $account['password']){

                $matched = true;
                $_SESSION['user'] = $account['username'];
                $_SESSION['authenticated'] = true;
                break;
            }
            
        }

      
    }
    if(!$matched)
    {
        header("location: index.php?error=login");
    }
    else{
        header("location: home.php");
    }
?>