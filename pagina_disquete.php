<?php session_start(); ?>
<?php
    $codigo = $_GET["codigo"];
    switch($codigo){
        case 1:
            $imagem = "images/personalizados/colorido.png";
            $titulo = "Disquete Colorido";
            $info = "Disquete com uma ampla variedade de cores";
        break;
        case 2:
            $imagem = "images/personalizados/disquete veridiano.png";
            $titulo = "Disquete Veridian";
            $info = "@veridianoforaobaile";
        break;
        case 3:
            $imagem = "images/personalizados/estampa.png";
            $titulo = "Disquete Estampado";
            $info = "rawr";
        break;
        case 4:
            $imagem = "images/personalizados/fafase lalau.png";
            $titulo = "Disquete lalau";
            $info = "Obra de arte";
        break;
        case 5:
            $imagem = "images/personalizados/germanodisk.png";
            $titulo = "Disquete Germano";
            $info = "Altamente germanico";
        break;
        case 6:
            $imagem = "images/neymar_gold.png";
            $titulo = "Neymar Gold Plus";
            $info = "Disquete do Neymar ouro mais";
        break;
        case 7:
            $imagem = "images/personalizados/ratuedisk-gudulegal.png";
            $titulo = "Disquete Ratue";
            $info = "gudu765";
        break;
        case 8:
            $imagem = "images/personalizados/retrodisk.png";
            $titulo = "Disquete Retrô";
            $info = "Somente classicos";
        break;

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floppy Arch</title>
    <link rel="stylesheet" href="css/disquetec.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                <a href="index.php"><img src="images/floppy_arch_title.png" width="100%"></a>
                </div>
                <div class="comprar">
                    <p ><b>➝Disquete</b></p>    
                </div>
            </div>
        </div>
        <div class="d2">
            <div class="d21">
                <div class="disc_titulo">
                   <u><b><?php echo($titulo); ?></b></u>
                </div>
                <div class="disc_baixo">
                    <div class="disc_img">
                        <img src="<?php echo($imagem); ?>" width="97%" >
                    </div>
                    <div class="disc_info">
                        <div class="branco">a</div>
                        <div class="discs_nome">
                            <?php echo($info); ?>
                        </div>
                        <div class="discs_capa"> 
                            <u>Capacidade</u>: <select id="ka" onchange="penis()">
                                <option>32gb</option>
                                <option>64gb</option>
                                <option>128gb</option>
                                <option>240gb</option>
                                <option>480gb</option>
                                <option>960gb</option>
                            </select>  

                        </div>
                        <div class="disc_price">
                            Preço ➝ <span id="kk" name="kk" style="color: lightgreen; ">R$40,00</span>
                        </div>
                        <div class="disc_carrinhocompra">
                            <button type="button" class="disc_comprar"> <b>COMPRAR</b> </button> 
                            <button type="button" class="disc_carrinho" onclick="botarnocarrinho('<?php echo $_GET['codigo']; ?>')"> <b>COLOCAR NO CARRINHO</b> </button>
                        </div>
                    </div>
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
    function botarnocarrinho(x) {
        if ("<?php echo $_SESSION['user']; ?>" === "none") {
            alert("Primeiramente faça login");
            window.open("entrar.php","_self");
        }else {
            var valor = document.getElementById("kk").textContent;  
            var url = "php/colocarnocarrinho.php?codigo=" + encodeURIComponent(x) + "&valor=" + encodeURIComponent(valor) + "&user=" + "<?php echo $_SESSION['user']; ?>";
            window.open(url, "_self");
        }
        
    }
    function penis() {
        var x = document.getElementById("ka").value;

    switch(x) {
        case '64gb': 
            document.getElementById("kk").innerHTML = "R$60,00";
        break;
        case '32gb': 
            document.getElementById("kk").innerHTML = "R$40,00";
        break;
        case '128gb': 
            document.getElementById("kk").innerHTML = "R$90,00";
        break;
        case '240gb': 
            document.getElementById("kk").innerHTML = "R$140,00";
        break;
        case '480gb': 
            document.getElementById("kk").innerHTML = "R$200,00";
        break;
        case '960gb': 
            document.getElementById("kk").innerHTML = "R$500,00";
        break;
    }
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