<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - FLOPPY ARCH</title>
    <link rel="stylesheet" href="css/pagamentopix.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.html"><img src="images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="criar_conta">
                        <p ><b>➝ Pagamento (pix)</b></p>    
                    </div>

                </div>

            </div>
        </div>
        <div class="d2">
            <div class="d222">
                <img src="images/disquete.gif" width="70%">
            </div>
            <div class="d21">

                <fieldset class="login">
                    <fieldset class="campo">
                        <legend class="legenda">Nome do pagador</legend>
                        <input type="text" class="yuuy" id="nome">
                    </fieldset>
                    <fieldset class="campo">
                        <legend class="legenda">CPF</legend>
                        <input type="text" class="yuuy" id="cpf" onkeyup="validarcpf()">
                    </fieldset>
                    <div class="entrar_criarconta">
                        <button href="pagamentopixqr.html" type="button" class="button" onclick="confirmar()">Confirmar</button>
                    </div>

                </fieldset>

            </div>
            <div class="d222">
                <img src="images/disquete.gif" width="70%">
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
    function confirmar() {
        if (cpf1 == 1 && nome.value != "")
        {
            window.location.href = "pagamentopixqr.html";
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