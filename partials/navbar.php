<?php 
    session_start();
    $user = $_SESSION['user'];
?>
<div class="navbar p-3  border-bottom border-gray ">
            <a href="" class="brand text-black  text-decoration-none fw-bold fs-3 d-flex align-items-center">
            4Finance
            </a>

            
            <ul class="nav-list d-flex gap-3 mr-5 my-auto">
                 
                <li class="list-item"><a href="home.php">Home</a></li>
                <li class="list-item"><a href="expense.php">Registrar Gasto</a></li>
                <li class="list-item"><a href="expenses.php">Meus Gastos</a></li>
            </ul>

            <ul class="d-flex gap-4">
            <li>Seja Bem vindo(a), <?= $user?></li>
            <li class="list-item"><a href="logout.php" class="fw-bolder">Sair</a></li>

            </ul>
</div>