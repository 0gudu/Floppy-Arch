<?php
    include("../includes/conecta.php");
    $id = $_GET["id"];

    $comando = $pdo->prepare("SELECT * FROM pedidos WHERE id_pedido = :id");
    $comando->bindParam(':id', $id);
    $comando->execute();

    $resultado = $comando->execute();

    while( $linhas = $comando->fetch()) 
        {
            $num = $linhas["numero"];
            $user = $linhas["usuario"];
        }

    $comando = $pdo->prepare("DELETE FROM pedidos WHERE pedidos.id_pedido = :id");
    $comando->bindParam(':id', $id);
    $comando->execute();    

    $comando = $pdo->prepare("DELETE FROM carrinho WHERE usuario = :user AND pedido = :pedido");
    $comando->bindParam(':user', $user);
    $comando->bindParam(':pedido', $num);
    $comando->execute();

    header("location: ../pages/verpedidos.php")
?>