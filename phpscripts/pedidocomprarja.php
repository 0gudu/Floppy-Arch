<?php 
    include("../includes/conecta.php");
    session_start();

    $preco = 0;
    $codigo = $_GET["codigo"];
    $valor = $_GET["valor"];
    $user = $_GET["user"];

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
    $comando = $pdo->prepare("INSERT INTO pedidos(usuario, statuss, datas, valor) VALUES(:user, :statuss, CURRENT_TIMESTAMP, :valor);");
    $comando->bindParam(':user', $user);
    $comando->bindParam(':statuss', $status);
    $status = "n pago";
    $comando->bindParam(':valor', $preco);
    $comando->execute();

    $id_pedido = $pdo->lastInsertId();
    $comando = $pdo->prepare("INSERT INTO carrinho (item,valor,usuario,pedido) VALUES(:codigo,:valor,:user,:pedido)");
    $comando->bindParam(':codigo', $codigo);
    $comando->bindParam(':valor', $preco);
    $comando->bindParam(':user', $user);
    $comando->bindParam(':pedido', $id_pedido);
    $comando->execute();

    
    
?>
<script>
    var url = "../pages/pagamento_seleção.php?pedido=<?php echo $id_pedido; ?>&valor=<?php echo $preco; ?>&user=<?php echo $_SESSION['user']; ?>";
    window.open(url, "_self");
</script>