<?php 
    include("conecta.php");
    session_start();

    $_SESSION['user'];
    $comando = $pdo->prepare("SELECT MAX(pedido) FROM carrinho;");
    $comando->execute();
    
    $resultado = $comando->fetchColumn();

    $cu = $resultado + 1;

    $comando = $pdo->prepare("UPDATE carrinho
    SET pedido = :pedido
    WHERE usuario = :usuario and pedido = 0;");

    $comando->bindParam(':pedido', $cu);
    $comando->bindParam(':usuario', $_SESSION['user']);
    $comando->execute();

   header("location: pedidos.php");
?>