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

    $comando = $pdo->prepare("INSERT INTO pedidos(usuario, numero, valor, statuss, datas) VALUES(:user, :numero, :valor, :statuss, CURRENT_TIMESTAMP);");
    $comando->bindParam(':user', $user);
    $comando->bindParam(':numero', $cu);
    $comando->bindParam(':statuss', $status);
    $status = "n pago";
    $comando->bindParam(':valor', $preco);
    $comando->execute();
    
?>
<script>
    var url = "../pages/pagamento_seleção.php?pedido=<?php echo $cu; ?>&valor=<?php echo $valor; ?>&user=<?php echo $_SESSION['user']; ?>";
    window.open(url, "_self");
</script>