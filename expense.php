<?php  require_once '../../personalFinance/pageProtector.php'; ?>
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

            <form action="registerExpense.php" method="post" class="form-control form-expense">
              <div class="row">
                <h2 class="text-center fs-4">Registrar novo Gasto</h2>
              </div>
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-control" required>

                <label for="date" class="form-label">Data do Gasto</label>
                <input type="date" name="date" id="date" class="form-control" required>
                <label for="type" class="form-label">Tipo de Gasto</label>
                <select name="type" id="type" class="form-control" required>
                  <option>Educação</option>
                  <option>Saúde</option>
                  <option>Supermercado</option>
                  <option>Banco</option>
                  <option>Outros</option>
                </select>
                <label for="expense" class="form-label">Gasto</label>
                <input type="number" name="expense" class="form-control" id="expense" required>

                <label for="description" class="form-label">Descrição do Gasto</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="5" required ></textarea>
                <hr>
                <button type="submit" class="btn btn-success container-fluid">Cadastrar Gasto</button>
            </form>
            
        </main>

        <?php include_once './partials/footer.php' ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
  </body>
</html>