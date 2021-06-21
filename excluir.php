<?php
session_start();

if (! isset($_SESSION["autenticado"])){
    header('Location: http://localhost/projeto/index.php');
}

require_once("Banco.php");
require_once("Entity/usuario.php");

$usuarios = new usuario($_POST);

$pdo = new Banco();

$linha = $pdo->exec($usuarios->getDelete());

    header('Location: http://localhost/projeto/consulta-usuario.php');

?>