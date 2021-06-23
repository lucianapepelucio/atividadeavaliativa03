<?php
session_start();
                 
if (! isset($_SESSION["autenticado"])){
    header('Location: http://localhost/projeto/index.php');
}

require_once("Banco.php");
require_once("Entity/usuario.php");

$usuarios = new usuario($_POST);

$pdo = new Banco();

$linha = $pdo->exec($usuarios->getUpdate());

if ($linha > 0) { 
   
    header('Location: http://localhost/projeto/editarUsuario.php?ok=1&id='.$_POST['id']);
}
else {
    header('Location: http://localhost/projeto/editarUsuario.php?ok=2&id='.$_POST['id']);
}

?>