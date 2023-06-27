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
    <link rel="stylesheet" href="../css/entrar.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                    <a href="index.php"><img src="../images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="entrar">
                        <p ><b>➝ <?php 
                    if($_SESSION['user'] == "none"){
                        echo "entrar";
                    } else {
                        include ("../includes/conecta.php");
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
                <img src="../images/disquete.gif" width="70%">
            </div>
            
            <div class="d21">
                <?php 
                    if($_SESSION["user"] == "none") {
                        echo('
                        <fieldset class="login">
                        <div id="conf" class="conf">NOME OU SENHA INCORRETOS</div>
                            <fieldset class="campo">
                                <legend class="legenda">Email</legend>
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
                <img src="../images/disquete.gif" width="70%">
            </div>
            
        </div>
        
        <?php include("../includes/menu.php");?>
    </div>  
</body>
<script src="../js/entrar.js"></script>
</html>