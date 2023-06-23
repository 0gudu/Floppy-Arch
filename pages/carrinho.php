<?php 
    session_start();
    $preco = 0;
    
    include("../phpscripts/carrinho_precototal.php");
    
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - FOPPY ARCH</title>
    <link rel="stylesheet" href="../css/carrinho.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                    <a href="index.php"><img src="../images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="criar_conta">
                        <p ><b>➝ Carrinho</b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
        <div class="d222">
                <div class="cima">
                    <?php
                        $comando = $pdo->prepare("SELECT foto from pessoas WHERE nome = :nome");
                        $comando->bindParam(":nome", $_SESSION['user']);
                        $resultado = $comando->execute();
                        $dados_imagem = $comando->fetchColumn();
                        $i = base64_encode($dados_imagem);
                        echo '<img src="data:image/jpeg;base64,' . $i . '" class="foto_adm">';
                        ?>

                </div>
                <div class="cima2">
                    <a href="index.php" class="sair_alterar">← Sair</a>
                    <a href="../pages/entrar.php" class="sair_alterar">Meu Perfil</a>
                </div>
                <hr class="hr1">
                    <p class="nome_adm">Valor Total ➝ R$<?php echo $preco; ?>,00</p>
                    <Button class="adicionar" onclick="pedido()">Finalizar Compra</Button>
            </div>
            <hr class="hr2">
            <div class="d21" id="puta">

                <?php include("../phpscripts/carrinho_itens.php");?>

            </div>
            
            
        </div>
    </div>  
</body>
<script>
    if ("<?php echo $_SESSION['user']; ?>" === "none") {
            alert("Primeiramente faça login");
            window.open("entrar.php","_self");
        }
    function pedido() {
            window.open("../phpscripts/pedidoscarrinho.php?valortota="+<?php echo $preco; ?>,"_self");
    }
    function Enviar(codigo) {
        window.open("../phpscripts/excluir_carrinho.php?codigo="+codigo,"_self")
    }
</script>
</html>
