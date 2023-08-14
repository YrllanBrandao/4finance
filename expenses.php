<?php 
  session_start();
  $user = $_SESSION['user'];

  $expense_file = fopen("expenses.ex", 'r');
  
?>
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
        <?php include './partials/navbar.php'; ?>
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

            <table class="table table-striped container-sm">
                <thead class="bg-dark text-white">
                    <th>Título</th>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                </thead>
                <tbody>
                    <?php
                    while(!feof($expense_file)){

                     $expense = fgets($expense_file);

                    $sliced_expense = explode("#", $expense);

                         if($sliced_expense[0] === $user) {
                            ?>
                            <tr>
                                <td><?= $sliced_expense[1]?></td>
                                <td><?= $sliced_expense[2]?></td>
                                <td><?= $sliced_expense[3]?></td>
                                <td><?= $sliced_expense[4]?></td>
                                <td><?= $sliced_expense[5]?></td>
                            </tr>
                            <?php
                         }
                                }

                    ?>
                </tbody>
            </table>
        </main>

        <?php include_once './partials/footer.php' ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
  </body>
</html>