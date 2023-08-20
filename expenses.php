<?php 


  require_once './vendor/autoload.php';
  require_once '../../personalFinance/pageProtector.php';
  
  $user = $_SESSION['userId'];


  use database\Connection;

  $connection = Connection::createConnection();

  $query = 'SELECT * FROM expenses  WHERE  owner_id = :owner_id';


  $statement = $connection -> prepare($query);
  $statement -> bindParam(':owner_id', $user);
  $statement -> execute();


  $expenses = $statement -> fetchAll(PDO::FETCH_ASSOC);

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
    <div class="container-fluid p-0 m-0" >
        <?php include './partials/navbar.php'; ?>
    
        <main class="d-flex flex-column justify-content-center align-items-center mt-4">

            <div class="table-responsive">
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
                      foreach($expenses as $expense){
                        ?>
                          <tr>
                            <td><?= $expense['title']?></td>
                            <td><?= $expense['date']?></td>
                            <td><?= $expense['type']?></td>
                            <td><?= $expense['value']?></td>
                            <td><?= $expense['description']?></td>
                          </tr>
                        <?php
                      }
                    ?>
                </tbody>
            </table>
            </div>
        </main>

        <?php include_once './partials/footer.php' ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
  </body>
</html>