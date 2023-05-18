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
                        <img src="images/floppy_arch_title.png" width="100%">
                    </div>
                    <div class="entrar">
                        <p ><b>➝ <?php 
                    if($_SESSION['user'] == "none"){
                        echo "entrar";
                    } else {
                        echo "Meu Perfil";
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
                        <button type="button" class="button2"><u> <a id="criar" href="criarconta.html">Criar conta</a></u> </button></div>
                        
                    </fieldset>
                        ');
                    }else {
                        echo '<div style="display:flex; flex-direction:column; color:white; font-weight:bolder; font-size:3vh;">';
                        echo $_SESSION["user"];
                            
                            echo ('
                            <form action="sair.php">
                            <div class="butao" ><button type="submit" class="button">
                            Sair</button> </div>
                            </form>
                            </fieldset>
                            </div>
                            ');
                    }
                ?>
                
                
            </div>
            <div class="d222">
                <img src="images/disquete.gif" width="70%">
            </div>
            
        </div>
        
        <div class="d3">
            <div class="footer">
                <div class="branco"> a</div>
                
                <span><u><b><a href="index.php" id="menupadrao">⬅ Inicio</a></b></u></span>
                <span><u><b><a href="comprar.html"  id="comprar">comprar</a></b></u></span>
                <span><u><b><a href="carrinho.html" id="menupadrao">Carrinho</a></b></u></span>
                <span><u><b><a href="entrar.html"  id="login"><?php 
                    if($_SESSION['user'] == "none"){
                        echo "Entrar";
                    } else {
                        echo $_SESSION['user'];
                    }
                
                ?> </a></u></b></span>
                <span><u><b><a href="contato.html"  id="menupadrao">Contato</a></u></b></span>

                <div class="branco"> a</div>
            </div>
        </div>
    </div>  
</body>
<script>
    console.log($_SESSION["user"])
    
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
        console.log(name);
        xhttp.open("GET", "vernome.php?q="+document.getElementById("vsf").value+"&e="+document.getElementById("sifude").value);
        xhttp.send();
    }

    function clicko(){
        if (name == 1) {
            document.getElementById("conf").style.display = "none";
            window.open("login.php?codigo="+vsf.value,"_self")
        } else {
            document.getElementById("conf").style.display = "flex";
            nome.value = "";
            senha.value = "";
        }
    }

</script>
</html>