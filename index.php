<?php include_once './middleware/autoRedirect.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Finanças pessoais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
  </head>
  <body>
    <div class="container-fluid p-0 m-0">
        <div class="navbar p-3  border-bottom border-gray ">
            <a href="./index.php" class="brand text-black  text-decoration-none fw-bold fs-3 d-flex align-items-center">
            4Finance
            </a>
        </div>
        <?php 
            $error = $_GET['error'];

            if($error === 'login')
            {
                   echo '<div class="alert alert-danger" role="alert">
                   E-mail e/ou Senha invalido!
                 </div>';
            }
            ?>
        <main class="d-flex flex-column justify-content-center align-items-center mt-4">

            <form class="card form-login" method="POST" action="auth.php">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    <input type="text" name="email" id="" placeholder="E-mail" class="form-control" required title="insira seu e-mail de usuário" >

                    <input type="password" name="password" id="" class="form-control" placeholder="Senha" required title="Insira sua senha">

                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>

        </form>
        </main>

        <footer class="fixed-bottom text-center">Created &copy; By Yrllan Brandão</footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
  </body>
</html>