<?php
session_start();
require_once("Banco.php");
require_once("Entity/usuario.php");


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

          <!-- Jquery -->
          <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
          <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

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
                    <a href="menu.php"><button type="submit" class="btn btn-outline-dark">Voltar</button></a>
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
               <h1><center>Usuários Cadastrados</center></h1>
               <br>
               <a class="btn btn-outline-dark" href="incluirUsuario.php" role="button">Novo Usuário</a>
               <br><br>
          
               <?php

               $pdo = new Banco();

               echo "<div class='container-fluid'>";
                    echo "<table id='table_id' class='display' >";
                         echo "<thead>";
                              echo "<tr><th>Id</th><th>Email</th><th>Senha</th><th>Nome</th><th></th><th></th></tr>";
                         echo "</thead>";
                         echo "<tbody>";
                              foreach($pdo->query('SELECT * from usuario') as $row) {
                                    echo "<tr><td>".$row['id']."</td><td>".$row['email']."</td><td>".
                                    $row['senha']."</td><td>".$row['nome']."</td><td>".
                                    "<a href=editarUsuario.php?id=".$row['id'].">Editar</a></td><td>".
                                    "<a href=excluirUsuario.php?id=".$row['id'].">Excluir</a></td></tr>"; 
                              }
                         echo "</tbody>";
                    echo "</table>";
               echo "</div>";
              ?>
          </div>
          <br>

          <script>
                $(document).ready( function () {
                $('#table_id').DataTable();
                } );
          </script>

     </body>
</html>