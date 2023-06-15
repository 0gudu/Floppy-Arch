<?php 
    $pedido = $_GET["pedido"];
    $valor = $_GET["valor"];
    $user = $_GET["user"];
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floppy Arch</title>
    <link rel="stylesheet" href="css/pagamento.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.php"><img src="images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="titulopag">
                        <p ><b>➝ Pagamento</b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">

            <div class="totalval">Total: <b style="color: rgb(10, 230, 10);"><?php echo $valor;?></b></div>

            <div class="embaixo">

                <div class="d222">
                    <img src="images/disquete.gif" width="70%">
                </div>

                <div class="metodos">
                    
                    <fieldset class="escolha">
                        
                        <div class="textometo">Metodos de Pagamento:</div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between; width: 80%; height: 23%; ">
                            <div class="metodo"><a style="color: yellow;"href="pagamento_cartao.html">Cartao</a></div>
                            <div class="metodo"><a style="color: yellow;" href="paga">Pix</a></div>
                            <div class="metodo"><a style="color: yellow;" href="pornhub.com">Boleto</a></div>
                        </div>
                    </fieldset>
                    
                </div>

                <div class="d222">
                    <img src="images/disquete.gif" width="70%">
                </div>

            </div>

        </div>
        
        <div class="d3">
        <div class="footer" onmouseleave="aparecer();" onmouseover="ocultar();">
                <div id="texto_menu" class="texto_menu">⬉⬉Menu⬈⬈</div>
                <div class="menu" id="menu">
                <div class="branco"> a</div>

                <a class="voltar" style="color: white;" onclick="voltarPagina()"><u><b>⬅ Voltar</b></u></a>
                <span><u><b><a href="comprar.php"  class="menu_amarelo"     id="comprar">Comprar</a></b></u></span>
                <span><u><b><a href="carrinho.php" class="menu_branco" id="menupadrao">Carrinho</a></b></u></span>
                <span><u><b><a href="entrar.php" class="menu_amarelo">
                <?php 
                    if($_SESSION['user'] == "none"){
                        echo "entrar";
                    } else {
                        echo $_SESSION['name'];
                    }
                
                ?>  </a></u></b></span>
                <span><u><b><a href="contato.html" class="menu_branco">Contato</a></u></b></span>
                <span><u><b><a href="faleconosco.php" class="menu_branco">Fale conosco</a></u></b></span>
                  
                </a></u></b></span>

                <div class="branco"> a</div>
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
</script>
</html>