<?php
    include("../includes/conecta.php");

    $codigo = $_GET["codigo"];

    $comando = $pdo->prepare("DELETE FROM pessoas WHERE nome = :codigo");
    $comando->bindParam(":codigo", $codigo);

    $resultado = $comando->execute();

    header("Location: ../pages/usuarios.php");
?>
