<?php
session_start();
require_once("Banco.php");
require_once("Entity/usuario.php");

if (! isset($_SESSION["autenticado"])){
    header('Location: http://localhost/projeto/index.php');
}

if (! isset($_GET["id"])) {
    echo '<div class="alert alert-danger" role="alert">
               Falta o id do usuário.
          </div>'; 
    die();
}

$pdo = new Banco();

$usuarios = new usuario();
$row = [];
foreach($pdo->query($usuarios->getSelectById($_GET["id"])) as $row) {
}

?>

<!DOCTYPE html>
<html lang="en">
     <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- Bootstrap CSS -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

          <title>DRIKKA PEPE - NUTRI FOODS</title>
          <link href="style.css" rel="stylesheet" type="text/css" />

          <!-- Google Fonts -->
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Emilys+Candy&display=swap" rel="stylesheet">

          <link rel="icon" type="image/png" href="icones/carrinho-de-comida.png"/>
     </head>

     <body>

          <!-- Cabeçalho -->
          <div class="container-fluid">
               <div class="row" id="cabecalho"> 
                    <div class="col-12">
                         <br>
                         <img src="imagens/logotipo.png" id="logotipo" alt="Logotipo" width="15%">
                         <br>
                         <h1 class="fontCandy"> <center>DRIKKA PEPE - NUTRI FOODS</center> </h1>
                         <br>
                    </div>
               </div>
          </div>
          <hr>

          <div class="container-fluid">
               <div class="d-grid gap-2 d-md-flex justify-content-md-left">
                    <a href="index.html"><button type="submit" class="btn btn-outline-dark">Home</button></a>
               </div>
          </div>
          <hr>

          <!-- Optional JavaScript; choose one of the two! -->

          <!-- Option 1: Bootstrap Bundle with Popper -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

          <!-- Option 2: Separate Popper and Bootstrap JS -->
          <!--
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
          -->

          <div class="container-fluid">
          <?php
               if (count($row) == 0 ){
                   echo '<div class="alert alert-danger" role="alert">
                         Este id não existe.
                        </div>'; 
               die();
               }
          ?>

               <h1><center>Deseja realmente excluir esse usuário?</center></h1>
               <br>
                
                <?php
                echo '
                <form action="excluir.php" method="post">
                <input type="hidden" name="id" value="'.$row['id'].'" >
                     <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Email</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="email"
                          value="'.$row['email'].'" disabled>
                     </div>
                     <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Senha</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="senha"
                          value="'.$row['senha'].'" disabled>
                     </div>
                     <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Nome</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="nome"
                          value="'.$row['nome'].'" disabled>
                     </div>
              
                     
                     <div class="row">
                          <div class="col">
                               <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="http://localhost/projeto/consulta-usuario.php"
                                    class="btn btn-dark" role="button"> Não </a>
                               </div>
                          </div>
                          <div class="col">
                               <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <input type="submit" value="Sim" class="btn btn-danger" role="button">
                               </div>
                          </div>
                     </div>

                </form>  
               ';
               ?>
          </div>
          <br>

     </body>
</html>