<?php
    include("conecta.php");

    $codigo = $_GET["codigo"];

    $comando = $pdo->prepare("INSERT INTO coisa (item) VALUES(:codigo)");
$comando->bindParam(':codigo', $codigo);
$comando->execute();
    //para voltar ao formulário//
    header("location: carrinho.php"); 
?>