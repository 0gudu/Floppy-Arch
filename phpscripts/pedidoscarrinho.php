<?php
    session_start();
    include ("../includes/conecta.php");
 
    $valortota = $_GET['valortota'];
    $user = $_SESSION['user'];

    $comando = $pdo->prepare("INSERT INTO pedidos(usuario, statuss, datas, valor) VALUES(:user, :statuss, CURRENT_TIMESTAMP, :valor);");
    $comando->bindParam(':user', $user);
    $comando->bindParam(':statuss', $status);
    $status = "n pago";
    $comando->bindParam(':valor', $valortota);
    $comando->execute();

    $comando = $pdo->prepare("SELECT LAST_INSERT_ID()");
    $comando->execute();
    $resultado = $comando->fetch();
    $idpedido = $resultado[0]; // Acessando o valor retornado pelo fetch()
    
    $comando = $pdo->prepare("UPDATE carrinho
    SET pedido = :idpedido
    WHERE pedido = 0 AND usuario = :user");
    $comando->bindParam(':idpedido', $idpedido);
    $comando->bindParam(':user', $_SESSION['user']);
    $comando->execute();
    
                    
    $resultado = $comando->execute();

    while( $linhas = $comando->fetch()) 
        {
            $n = $linhas["item"];
            $p = $linhas["pedido"];

            echo ("item:$n pedido:$p <br>");
        }
?>
<script>
    var url = "../pages/pagamento_seleção.php?pedido=<?php echo $idpedido; ?>&valor=<?php echo $valortota; ?>&user=<?php echo $_SESSION['user']; ?>";
    window.open(url, "_self");
</script>