<?php
    include("../includes/conecta.php");

    $codigo = $_GET["codigo"];

    $comando = $pdo->prepare("DELETE FROM produtos WHERE id_produto=$codigo");

    $resultado = $comando->execute();

    header("location: ../pages/produtosadministrador.php");
?>