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

                    <p class="nome_adm">Valor Total ➝ R$<?php echo $preco; ?>,00</p>
                    <Button class="adicionar" onclick="pedido()">Finalizar Compra</Button>
            </div>
            <hr class="hr2">
            <div class="d21" id="puta">

                <?php include("../phpscripts/carrinho_itens.php");?>

            </div>
            
            
        </div>
        <div class="d3">
        <div class="footer" onmouseleave="aparecer();" onmouseover="ocultar();">
            <div id="texto_menu" class="texto_menu">⬉⬉Menu⬈⬈</div>
            <div class="menu" id="menu">
                <div class="branco"> a</div>

                <a class="voltar" style="color: white;" onclick="voltarPagina()" style="margin-left: 3%; margin-right: 3%;"><u><b>⬅ Voltar</b></u></a>
                <span><u><b><a href="comprar.php"  class="menu_amarelo" id="comprar" style="margin-left: 3%; margin-right: 3%;">Comprar</a></b></u></span>
                <span><u><b><a href="carrinho.php" class="menu_branco" id="menupadrao" style="margin-left: 3%; margin-right: 3%;">Carrinho</a></b></u></span>
                <span><u><b><a href="entrar.php" class="menu_amarelo" style="margin-left: 3%; margin-right: 3%;">
                <?php 
                    if($_SESSION['user'] == "none"){
                        echo "entrar";
                    } else {
                        echo $_SESSION['name'];
                    }
                
                ?>  </a></u></b></span>
                <span><u><b><a href="contato.php" class="menu_branco" style="margin-left: 3%; margin-right: 3%;">Contato</a></u></b></span>
                <span><u><b><a href="faleconosco.php" class="menu_branco" style="margin-left: 3%; margin-right: 3%;">Fale conosco</a></u></b></span>
                  
                <div class="branco"> a</div>
            </div>
        </div>
    </div>
    </div>  
</body>
<script>

    texto_menu.style.display="inline";
    menu.style.display="none";

    function ocultar()
    {
    texto_menu.style.display="none";
        menu.style.display="inline";
    }

    function aparecer()
    {
        texto_menu.style.display="inline";
        menu.style.display="none";
    }

    function voltarPagina() 
    {
        window.history.back();
    }

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
