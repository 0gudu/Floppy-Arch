<?php
    include("conecta.php");
    
    $preco = 0;
    $codigo = $_GET["codigo"];
    $valor = $_GET["valor"];
    $user = $_GET["user"];

    echo "codigo: $codigo<Br> valor: $valor<br> user: $user";
    switch ($valor) {
        case "R$40,00";
            $preco += 40;
            break;
        case "R$60,00";
            $preco += 60;
            break;
        case "R$90,00":
            $preco += 90;
            break;
        case "R$140,00":
            $preco += 140;
            break;
        case "R$200,00":
            $preco += 200;
            break;
        case "R$500,00":
            $preco += 500;
            break;
  
    }
    $comando = $pdo->prepare("INSERT INTO carrinho (item,valor,usuario) VALUES(:codigo,:valor,:user)");
    $comando->bindParam(':codigo', $codigo);
    $comando->bindParam(':valor', $preco);
    $comando->bindParam(':user', $user);
    $comando->execute();

    header("location: carrinho.php"); 
?>