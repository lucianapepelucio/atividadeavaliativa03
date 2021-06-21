<?php
session_start();
require_once("Banco.php");

if (! isset($_SESSION["autenticado"])){
    header('Location: http://localhost/projeto/index.php');
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
          <script src="script.js"></script>

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
                    <a href="consulta-usuario.php"><button type="submit" class="btn btn-outline-dark">Cadastro de Usuários</button></a>
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
          <?php
              echo "<h1><center>Consulta ao Banco de Dados</center></h1><br><br>";

              $pdo = new Banco();
        
              echo "<div class='container'>";
                   echo "<table class='table'>";
                        echo "<tr><th>Id</th><th>Email</th><th>Senha</th>";
        
                        foreach($pdo->query('SELECT * from usuario') as $row) {
                             echo "<tr><td>".$row['id']."</td><td>".$row['email']."</td><td>".$row['senha']."</td></tr>";
                        }
              
                   echo "</table>";
             echo "</div>";
          ?>

     <br>
     </body>
</html>
