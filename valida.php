<?php
session_start();
require_once("Banco.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$pdo = new Banco ();

//
//NAO FACA ISSO EM PRODUCAO DEVIDO AO ATAQUE DE SQL INJECTION
//
$sql = "SELECT * from usuario where email = '$email' and senha = '$senha'";
$result = $pdo->query($sql);

if (empty($result->rowCount())) {
    unset($_SESSION["autenticado"]);
    header('Location: http://localhost/projeto/index.php');
}
else {
    $_SESSION["autenticado"]=true;
    header('Location: http://localhost/projeto/menu.php');
}
?>