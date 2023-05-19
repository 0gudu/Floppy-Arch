<?php
    include("conecta.php");

    $codigo = $_GET["codigo"];

    $comando = $pdo->prepare("DELETE FROM carrinho WHERE id_coisa=$codigo");

    $resultado = $comando->execute();

    header("location: carrinho.php");
?>