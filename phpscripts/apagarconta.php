<?php 
    $user = $_GET['user'];
    include('../includes/conecta.php');
    session_start();

    $comando = $pdo->prepare("DELETE FROM carrinho WHERE usuario = :user");
    $comando->bindParam(':user', $user);
    $comando->execute();

    $comando = $pdo->prepare("DELETE FROM pedidos WHERE usuario = :user");
    $comando->bindParam(':user', $user);
    $comando->execute();

    $comando = $pdo->prepare("DELETE FROM pessoas WHERE nome = :user");
    $comando->bindParam(':user', $user);
    $comando->execute();
    
    $_SESSION["user"] = "none";
    header("location: ../pages/index.php");


?>