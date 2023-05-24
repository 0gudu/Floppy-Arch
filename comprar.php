<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floppy Arch</title>
    <link rel="stylesheet" href="css/comprar.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <img src="images/floppy_arch_title.png">
                    </div>
                    <div class="comprar">
                        <p ><b>➝ Comprar (1/2)</b></p>    
                    </div>
                </div>
            </div>
        </div>
        <div class="d2">
            <div class="nada">

            </div>
            <div class="d21">
                <div onclick="Enviar(1);" class="itemshowcase">
                    <div class="disqueteshowcase">
                        <img src="images/Personalizados/Colorido.png" width="90%">
                    </div>
                    <div  class="legendashowcase">
                        <u><b><p class="legendap">Disquete Colorido</p></b></u>
                    </div>
                </div>
                <div onclick="Enviar(2);" class="itemshowcase">
                    <div class="disqueteshowcase">
                        <img src="images/Personalizados/disquete veridiano.png" width="90%">
                    </div>
                    <div class="legendashowcase">
                        <u><b><p class="legendap">Disquete Veridian</p></b></u>
                    </div>
                </div>
                <div onclick="Enviar(3);" class="itemshowcase">
                    <div class="disqueteshowcase">
                        <img src="images/Personalizados/estampa.png" width="90%">
                    </div>
                    <div class="legendashowcase">
                        <u><b><p class="legendap">Disquete estampado</p></b></u>
                    </div>
                </div>
                <div onclick="Enviar(4);" class="itemshowcase">
                    <div class="disqueteshowcase">
                        <img src="images/Personalizados/fafase lalau.png" width="90%">
                    </div>
                    <div class="legendashowcase">
                        <u><b><p class="legendap">Disquete lalau</p></b></u>
                    </div>
                </div>
                <div onclick="Enviar(5);" class="itemshowcase">
                    <div class="disqueteshowcase">
                        <img src="images/Personalizados/germanodisk.png" width="90%">
                    </div>
                    <div class="legendashowcase">
                        <b><u><p class="legendap">Disquete germano</p></u></b>
                    </div>
                </div>
                <div onclick="Enviar(6);" class="itemshowcase">
                    <div class="disqueteshowcase">
                        <img src="images/Personalizados/neymar_gold.png" width="90%">
                    </div>
                    <div class="legendashowcase">
                        <u><b><p class="legendap">Disquete neymar gold</p></b></u>
                    </div>
                </div>
                <div onclick="Enviar(7);" class="itemshowcase">
                    <div class="disqueteshowcase">
                        <img src="images/Personalizados/ratuedisk-gudulegal.png" width="90%">
                    </div>
                    <div class="legendashowcase">
                        <u><b><p class="legendap">Disquete ratue</p></b></u>
                    </div>
                </div>
                <div onclick="Enviar(8);" class="itemshowcase">
                    <div class="disqueteshowcase">
                        <img src="images/Personalizados/retrodisk.png" width="90%">
                    </div>
                    <div class="legendashowcase">
                        <u><b><p class="legendap">Disquete retro</p></b></u>
                    </div>
                </div>
            </div>
            <div class="seta_direita">
                <a id="seta" href="comprar2.php">
                <img src="images/Seta_direita.png" class="img_seta">
                </a>
            </div>
        </div>
        
        <div class="d3">
            <div class="footer">
                <div class="branco"> a</div>
                
                <span><u><b><a href="index.php" id="menupadrao">⬅ Inicio</a></b></u></span>
                <span><u><b><a href="comprar.php"  id="comprar">Comprar</a></b></u></span>
                <span><u><b><a href="carrinho.php" id="menupadrao">Carrinho</a></b></u></span>
                <span><u><b><a href="entrar.php"  id="login">
                <?php 
                    if($_SESSION['user'] == "none"){
                        echo "entrar";
                    } else {
                        echo $_SESSION['user'];
                    }
                
                ?>    
                </a></u></b></span>
                <span><u><b><a href="contato.html"  id="menupadrao">Contato</a></u></b></span>

                <div class="branco"> a</div>
            </div>
        </div>
    </div>  
</body>
<script>
    function Enviar(codigo) {

        window.open("pagina_disquete.php?codigo="+codigo,"_self")
    }
</script>
</html>