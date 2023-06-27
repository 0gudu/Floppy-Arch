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
    <link rel="stylesheet" href="../css/criarconta.css" /> 
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
                        <p ><b>➝ Criar conta</b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
            <div class="d21">
                
                <fieldset class="login">
                    <div class="campos">
                        <form action="../phpscripts/dadospessoa.php" class="campos" method="post">
                                <div class="dir">
                                       
                                    
                                    <fieldset class="campo">
                                        <legend class="legenda">Nome</legend>
                                        <input type="text" class="yuuy" placeholder="Insira seu nome" id="nome" name="nome">
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
                                <div class="aviso" id="aviso">Este email já está sobre uso</div>
                                    <fieldset class="campo">
                                        <legend class="legenda">E-mail</legend>
                                        <input type="email" class="yuuy" placeholder="Insira seu E-mail" id="email" name="email" onkeyup="verificar()">
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
        
        <?php include("../includes/menu.php");?>
    </div>  
</body>
<script src="../js/criarconta.js"></script>
</html>