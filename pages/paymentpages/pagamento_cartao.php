<?php 
    session_start();
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
    <link rel="stylesheet" href="css/pagcartao.css" /> 
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

            <div class="embaixo">

                <div class="metodos">

                    <fieldset class="escolha">

                        <div class="lado">
                            <fieldset class="campo">
                                <legend class="legenda">Nome</legend>
                                <input type="text" class="yuuy" id="nome">
                            </fieldset>

                            <fieldset class="campo">
                                <legend class="legenda">Validade (MM/AA)</legend>
                                <input type="text" class="yuuy" id="val" onkeyup="validarval()">
                            </fieldset>
                        </div>

                        <div class="lado">
                            <fieldset class="campo">
                                <legend class="legenda">CPF</legend>
                                <input type="text" class="yuuy" id="cpf" onkeyup="validarcpf()">
                            </fieldset>

                            <fieldset class="campo">
                                <legend class="legenda">Codigo CVV</legend>
                                <input type="text" class="yuuy" id="cvv" onkeyup="validarcvv()">
                            </fieldset>
                        </div>

                        <div class="unico">
                            <fieldset class="campo">
                                <legend class="legenda">Numero do cartão</legend>
                                <input type="text" class="yuuy" id="cc" onkeyup="validarcc()">
                            </fieldset>
                        </div>
                        
                        <button class="confirma" type="button" onclick="confirma()">Confirmar</button>

                    </fieldset>
                    

                    </fieldset>
                    
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
    cpf1 = 0;
    cvv1 = 0;
    cc1 = 0;   
    val1 = 0; 
    function validarcpf() {
        expressao = /^[0-9]{11}$/g;
        resposta = expressao.test(cpf.value);
        if (resposta==true)
        {
            cpf.classList.remove('errado');
            cpf.classList.add('certo');
            cpf1=1;
        }
        if (resposta==false)
        {
            cpf.classList.remove('certo');
            cpf.classList.add('errado');
            cpf1 = 0;
        }
    }

    function validarcvv() {
        expressao = /^[0-9]{3}$/g;
        resposta = expressao.test(cvv.value);
        if (resposta==true)
        {
            cvv.classList.remove('errado');
            cvv.classList.add('certo');
            cvv1 = 1;
        }
        if (resposta==false)
        {
            cvv.classList.remove('certo');
            cvv.classList.add('errado');
            cvv1 = 0;
        }

    }
    function validarcc() {
        expressao = /^[0-9]{16}$/g;
        resposta = expressao.test(cc.value);
        if (resposta==true)
        {
            cc.classList.remove('errado');
            cc.classList.add('certo');
            cc1 = 1;
        }
        if (resposta==false)
        {
            cc.classList.remove('certo');
            cc.classList.add('errado');
            cc1 = 0;
        }
    }
    function validarval() {
        expressao = /^[0-9]{4}$/g;
        resposta = expressao.test(val.value);
        if (resposta==true)
        {
            val.classList.remove('errado');
            val.classList.add('certo');
            val1 = 1;
        }
        if (resposta==false)
        {
            val.classList.remove('certo');
            val.classList.add('errado');
            val1 = 0;
        }
    }
    function confirma() {
        if(cpf1 == 1 && cvv1 == 1 && cc1 == 1 && val1 == 1 && nome.value != "")
        {
            var url = "pagarpedido.php?pedido=<?php echo $pedido; ?>&valor=<?php echo $valor; ?>&user=<?php echo $_SESSION['user']; ?>";
            window.open(url, "_self");
        }
        else {
            alert("complete todos os campos corretamente")
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