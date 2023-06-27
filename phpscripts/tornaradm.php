<?php
include('../includes/conecta.php');
$admss = $_GET['amd'];
$user = $_GET['user'];

if ($admss == 0) {
    $comando = $pdo->prepare("UPDATE pessoas SET adm = 1 where nome = :nome");
    $comando->bindParam(":nome", $user);
    $comando->execute();
    $resultado = $comando->execute();
    header("location: ../pages/usuarios.php");
}else if ($admss == 1){
    $comando = $pdo->prepare("UPDATE pessoas SET adm = 0 where nome = :nome");
    $comando->bindParam(":nome", $user);
    $comando->execute();
    $resultado = $comando->execute();
    header("location: ../pages/usuarios.php");
}
    
?>
