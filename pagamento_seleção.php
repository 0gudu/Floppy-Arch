<?php 
    $pedido = $_GET["pedido"];
    $valor = $_GET["valor"];
    $user = $_GET["user"];
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
                        <img src="images/floppy_arch_title.png" width="100%">
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
            <div class="footer">
                <div class="branco"> a</div>
                
                <span><u><b><a href="index.html" id="menupadrao">⬅ Inicio</a></b></u></span>
                <span><u><b><a href="comprar.html"  id="comprar">Comprar</a></b></u></span>
                <span><u><b><a href="carrinho.html" id="menupadrao">Carrinho</a></b></u></span>
                <span><u><b><a href="entrar.html"  id="login">Entrar</a></u></b></span>
                <span><u><b><a href="contato.html"  id="menupadrao">Contato</a></u></b></span>

                <div class="branco"> a</div>
            </div>
        </div>
    </div>  
</body>
</html>