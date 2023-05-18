<?php
    include("conecta.php");

    $codigo = $_GET["codigo"];
    $valor = $_GET["valor"];

    $comando = $pdo->prepare("INSERT INTO coisa (item,valor) VALUES(:codigo,:valor)");
    $comando->bindParam(':codigo', $codigo);
    $comando->bindParam(':valor', $valor);
    $comando->execute();
    //para voltar ao formulário//
    header("location: carrinho.php"); 
?>