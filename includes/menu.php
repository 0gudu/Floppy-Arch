<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="../css/menu.css" /> 
</head>
<body>
    <div class="d3">
        <div class="footer" onmouseleave="aparecer();" onmouseover="ocultar();">
            <div id="texto_menu" class="texto_menu">⬉⬉Menu⬈⬈</div>
            <div class="menu" id="menu">
                <div class="branco"> a</div>

                <a class="voltar" style="color: white;" onclick="voltarPagina()"><u><b>⬅ Voltar</b></u></a>
                <span><u><b><a href="comprar.php"  class="menu_amarelo" id="comprar">Comprar</a></b></u></span>
                <span><u><b><a href="carrinho.php" class="menu_branco" id="menupadrao">Carrinho</a></b></u></span>
                <span><u><b><a href="entrar.php" class="menu_amarelo">
                <?php 
                    if($_SESSION['user'] == "none"){
                        echo "entrar";
                    } else {
                        echo $_SESSION['name'];
                    }
                
                ?>  </a></u></b></span>
                <span><u><b><a href="contato.php" class="menu_branco">Contato</a></u></b></span>
                <!--<span><u><b><a href="faleconosco.php" class="menu_branco">Fale conosco</a></u></b></span>-->
                  
                <div class="branco"> a</div>
            </div>
        </div>
    </div>
</body>
<script src="../js/menu.js"></script>
</html>
