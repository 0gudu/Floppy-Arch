<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOPPY ARCH - Criar conta</title>
    <link rel="stylesheet" href="css/criarconta.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                    <a href="index.php"><img src="images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="entrar">
                        <p ><b>➝ Criar conta</b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
            <div class="d21">
                
                <fieldset class="login">
                    <div class="campos">
                        <form action="dadospessoa.php" class="campos" method="post">
                                <div class="dir">
                                       
                                    <div class="aviso" id="aviso">Este nome já está sobre uso</div>
                                    <fieldset class="campo">
                                        <legend class="legenda">Nome</legend>
                                        <input type="text" class="yuuy" placeholder="Insira seu nome" id="nome" name="nome" onkeyup="verificar()">
                                    </fieldset>

                                    <fieldset class="campo">
                                        <legend class="legenda">Endereço</legend>
                                        <input type="text" class="yuuy" placeholder="Insira seu endereço" id="endereco" name="endereco">
                                    </fieldset>

                                    <fieldset class="campo">
                                        <legend class="legenda" >Telefone</legend>
                                        <input type="number" class="yuuy" placeholder="Insira seu telefone" id="telefone" name="telefone">
                                    </fieldset>

                                </div>

                                <div class="esq">

                                    <fieldset class="campo">
                                        <legend class="legenda">E-mail</legend>
                                        <input type="email" class="yuuy" placeholder="Insira seu E-mail" id="email" name="email">
                                    </fieldset>

                                    <fieldset class="campo">
                                        <legend class="legenda">Senha</legend>
                                        <input type="password" class="yuuy" placeholder="Crie sua Senha" id="senha" name="senha" onkeyup="senhass()">
                                    </fieldset>

                                    <fieldset class="campo">
                                        <legend class="legenda">Confirmar senha</legend>
                                        <input type="password" class="yuuy" id="confirmaa" placeholder="Confirme sua senha" onkeyup="senhass()">
                                    </fieldset>

                                </div>
                                
                                


                    </div>
                    <button class="confirma" type="button" onclick="enviarver()" id="confirma">Confirmar</button>
                </form>
                    
                </fieldset>
                
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
<script src="jquery-3.6.4.min.js"> </script>
<script>
    name = 0;

    function verificar() { 
        const xhttp = new XMLHttpRequest();
        nome = document.getElementById("nome");
        xhttp.onreadystatechange = function() {
            if(xhttp.responseText == 0){
                nome.style.color = "green";
                name = 1;
                aviso.style.display = "none";
            } else {
                nome.style.color = "red";
                name = 0;
                aviso.style.display = "flex";
            }
            
        };

        xhttp.open("GET", "verificarnomeemail.php?q="+document.getElementById("nome").value+"&e="+document.getElementById("email").value);
        xhttp.send();
    }

    function senhass() {
        senha1 = 0;
        if (senha.value == confirmaa.value) {
            confirmaa.classList.remove('errado');
            confirmaa.classList.add('certo');
            senha1 = 1;
        } else {
            confirmaa.classList.remove('certo');
            confirmaa.classList.add('errado');
            senha1 = 0;
        }

    }

    function enviarver() {

        if (name == 1 && endereco.value != "" && telefone.value != "" && email.value != "" &&  senha1 == 1){
            confirma.type = "submit";
        }
        else {
            alert("veja se voce preencheu todos os campos");
            confirma.type = "button";
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