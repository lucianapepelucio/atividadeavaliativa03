<?php
session_start();

if (! isset($_SESSION["autenticado"])){
    header('Location: http://localhost/projeto/index.php');
}

require_once("Banco.php");
require_once("Entity/usuario.php");

var_dump($_POST); // exibir na tela

$usuarios = new usuario($_POST);

$pdo = new Banco();

$linha = $pdo->exec($usuarios->getInsert());

if ($linha > 0) {
    header('Location: http://localhost/projeto/incluirUsuario.php?ok=1');
}
else {
    echo "Erro";
}

?>

