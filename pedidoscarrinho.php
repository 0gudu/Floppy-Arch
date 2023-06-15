<?php
    session_start();
    include ("conecta.php");

    $valortota = $_GET['valortota'];

    $comando = $pdo->prepare("SELECT MAX(pedido) FROM carrinho;");
    $comando->execute();
    
    $resultado = $comando->fetchColumn();
    $user = $_SESSION['user'];
    $cu = $resultado + 1;

    $comando = $pdo->prepare("INSERT INTO pedidos(usuario, numero, statuss, datas, valor) VALUES(:user, :numero, :statuss, CURRENT_TIMESTAMP, :valor);");
    $comando->bindParam(':user', $user);
    $comando->bindParam(':numero', $cu);
    $comando->bindParam(':statuss', $status);
    $status = "n pago";
    $comando->bindParam(':valor', $valortota);
    $comando->execute();

    $comando = $pdo->prepare("UPDATE carrinho
    SET
      pedido = $cu
    WHERE
      pedido = 0 AND usuario = :user");
    $comando->bindParam(':user', $_SESSION['user']);
    $comando->execute();
                    
    $resultado = $comando->execute();

    while( $linhas = $comando->fetch()) 
        {
            $n = $linhas["item"];
            $p = $linhas["pedido"];

            echo ("item:$n pedido:$p <br>");
        }

        

        
    
    header("location: perfil.php");
?>