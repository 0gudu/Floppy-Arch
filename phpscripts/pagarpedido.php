<?php
    include("../includes/conecta.php");

    $pedido = $_GET["pedido"];
    $valor = $_GET["valor"];
    $user = $_GET["user"];

     
    $comando = $pdo->prepare("UPDATE pedidos SET statuss='pago' WHERE id_pedido = :num AND usuario = :user");
    $comando->bindParam(':num', $pedido);
    $comando->bindParam(':user', $user);
    $resultado = $comando->execute();

    header("location: ../pages/verpedidos.php");
?>