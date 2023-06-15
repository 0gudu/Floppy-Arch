<?php 
    include("conecta.php");
    session_start();

    $codigo = $_GET["codigo"];
    $valor = $_GET["valor"];
    $user = $_GET["user"];

    $comando = $pdo->prepare("SELECT MAX(pedido) FROM carrinho;");
    $comando->execute();
    
    $resultado = $comando->fetchColumn();

    $cu = $resultado + 1;

    $comando = $pdo->prepare("INSERT INTO carrinho (item,valor,usuario,pedido) VALUES(:codigo,:valor,:user,:pedido)");
    $comando->bindParam(':codigo', $codigo);
    $comando->bindParam(':valor', $valor);
    $comando->bindParam(':user', $user);
    $comando->bindParam(':pedido', $cu);
    $comando->execute();

    $comando = $pdo->prepare("INSERT INTO pedidos(usuario, numero, statuss, datas) VALUES(:user, :numero, :statuss, CURRENT_TIMESTAMP);");
    $comando->bindParam(':user', $user);
    $comando->bindParam(':numero', $cu);
    $comando->bindParam(':statuss', $status);
    $status = "n pago";
    $comando->execute();
    
?>
<script>
    var url = "pagamento_seleção.php?pedido=<?php echo $cu; ?>&valor=<?php echo $valor; ?>&user=<?php echo $_SESSION['user']; ?>";
    window.open(url, "_self");
</script>