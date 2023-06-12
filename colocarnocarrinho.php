<?php
    include("conecta.php");
    
    $codigo = $_GET["codigo"];
    $valor = $_GET["valor"];
    $user = $_GET["user"];
    echo "codigo: $codigo<Br> valor: $valor<br> user: $user";
    $comando = $pdo->prepare("INSERT INTO carrinho (item,valor,usuario) VALUES(:codigo,:valor,:user)");
    $comando->bindParam(':codigo', $codigo);
    $comando->bindParam(':valor', $valor);
    $comando->bindParam(':user', $user);
    $comando->execute();

    header("location: carrinho.php"); 
?>