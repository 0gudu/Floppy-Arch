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
    <link rel="stylesheet" href="css/comprar2.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                    <a href="index.php"><img src="images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="comprar">
                        <p ><b>➝ Comprar</b></p>    
                    </div>
                </div>
            </div>
        </div>
        <div class="d2">
            <div class="d21">
                <?php 
                    include ("conecta.php");
                    $comando = $pdo->prepare("SELECT * FROM produtos");
                    $comando->execute();    
                
                    $resultado = $comando->execute();

                    while( $linhas = $comando->fetch()) 
                        {
                            $idprod = $linhas["id_produto"]; //nome da coluna xampp
                            $nome = $linhas["nome"];
                            $foto = $linhas["caminhofoto"];

                            echo('
                            <div onclick="Enviar(' . $idprod . ');" class="itemshowcase">
                            <div class="disqueteshowcase">
                                <img src="' . $foto . '" width="90%">
                            </div>
                            <div  class="legendashowcase">
                                <u><b><p class="legendap">' . $nome . '</p></b></u>
                            </div>
                        </div>
                            
                            
                            ');

                        }
                ?>
                
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
                        echo $_SESSION['user'];
                    }
                
                ?>  </a></u></b></span>
                <span><u><b><a href="contato.html" class="menu_branco">Contato</a></u></b></span>
                <span><u><b><a href="faleconosco.html" class="menu_branco">Fale conosco</a></u></b></span>
                  
                </a></u></b></span>

                <div class="branco"> a</div>
            </div>
        </div>
    </div>  
</body>
<script>
    function Enviar(codigo) {

        window.open("pagina_disquete.php?codigo="+codigo,"_self")
    }   
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