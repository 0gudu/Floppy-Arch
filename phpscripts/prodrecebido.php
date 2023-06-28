<?php 
$pedido = $_GET['pedido'];
include("../includes/conecta.php");

$ss = "Recebido";

$comando = $pdo->prepare("UPDATE pedidos SET statuss = :statuss WHERE id_pedido = $pedido");
$comando->bindParam(':statuss', $ss);
$comando->execute();

header("location: ../pages/index.php");
?>