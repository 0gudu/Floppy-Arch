<?php
    session_start();
    include ("conecta.php");
    $comando = $pdo->prepare("SELECT * FROM carrinho WHERE usuario = :user AND pedido > 0");
    $comando->bindParam(':user', $_SESSION['user']);
    $comando->execute();    
                    
    $resultado = $comando->execute();

    while( $linhas = $comando->fetch()) 
        {
            $n = $linhas["item"];
            $p = $linhas["pedido"];

            echo ("item:$n pedido:$p <br>");
        }

        $_SESSION['user'];
    $comando = $pdo->prepare("SELECT MAX(pedido) FROM carrinho;");
    $comando->execute();
    
    $resultado = $comando->fetchColumn();

    $x = 0;
    while ($x != $resultado) {
        echo "cu <br>";
        $x++;
    }
    header("location: perfil.php");
?>