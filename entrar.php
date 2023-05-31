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
    <link rel="stylesheet" href="css/entrar.css" /> 
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
                        <p ><b>➝ <?php 
                    if($_SESSION['user'] == "none"){
                        echo "entrar";
                    } else {
                        include ("conecta.php");
                        $comando = $pdo->prepare("SELECT adm FROM pessoas where nome = :user");
                        $comando->bindParam(':user', $_SESSION['user']);
                        $comando->execute();
                        $res =$comando->fetch();
                        if ($res['adm'] == 1)
                        {
                            header("location: perfiladministrador.php");
                        }else {
                            header("location: perfil.php");
                        }
                        
                    }
                
                ?> </b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
            <div class="d222">
                <img src="images/disquete.gif" width="70%">
            </div>
            
            <div class="d21">
                <?php 
                    if($_SESSION["user"] == "none") {
                        echo('
                        <fieldset class="login">
                        <div id="conf" class="conf">NOME OU SENHA INCORRETOS</div>
                            <fieldset class="campo">
                                <legend class="legenda">Nome</legend>
                                <input type="text" name="vsf" id="vsf" class="yuuy">
                            </fieldset>
                            <fieldset class="campo">
                                <legend class="legenda" >Senha</legend>
                                <input type="password" name="sifude" id="sifude" class="yuuy" onkeyup="ficar()">
                            </fieldset>
                        <div class="butao"><button type="button" class="button" onclick="clicko()">
                            Entrar</button> 
                        <button type="button" class="button2"><u> <a id="criar" href="criarconta.php">Criar conta</a></u> </button></div>
                        
                    </fieldset>
                        ');
                    }
                ?>
                
                
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
    
    function ficar() { 
        const xhttp = new XMLHttpRequest();
        nome = document.getElementById("vsf");
        senha = document.getElementById("sifude");
        xhttp.onreadystatechange = function() {
            if(xhttp.responseText == 1){
                name = 1; 

            } else {
                name = 0;
            }
            
        };
        xhttp.open("GET", "vernome.php?q="+document.getElementById("vsf").value+"&e="+document.getElementById("sifude").value);
        xhttp.send();
    }

    function clicko(){
        if (name == 1) {
            document.getElementById("conf").style.display = "none";
            var form = document.createElement("form");
            form.method = "post";
            form.action = "login.php";

            var campoCodigo = document.createElement("input");
            campoCodigo.type = "hidden";
            campoCodigo.name = "codigo";
            campoCodigo.value = vsf.value;
            form.appendChild(campoCodigo);

            document.body.appendChild(form);
            form.submit();

        } else {
            document.getElementById("conf").style.display = "flex";
            nome.value = "";
            senha.value = "";
        }
    }
    
</script>
</html>