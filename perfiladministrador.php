<?php 
    session_start();
    if($_SESSION['user'] == "none"){
        header("location: entrar.php");
    }
    include ("conecta.php");

    $comando = $pdo->prepare("SELECT adm FROM pessoas WHERE nome = :user");
    $comando->bindParam(':user', $_SESSION['user']);
    $comando->execute();
    $res =$comando->fetch();

    if ($res['adm'] == 0) {
        header("location: entrar.php");
    }
    include ("conecta.php");
    $comando = $pdo->prepare("SELECT * FROM pessoas WHERE nome = :user");
    $comando->bindParam(':user', $_SESSION['user']);
    $comando->execute();
    $res =$comando->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil ADM</title>
    <link rel="stylesheet" href="css/perfiladministrador.css" /> 
</head>
<body>
    <div class="config" id="config">
        <div class="titulo_config center">
            Configurações 
            <button class="fechar_voltar" onclick="desaparecerConfig()" id="fechar">Fechar ✖</button>
        </div>
        <hr class="hr_config">
        <button class="button_config" onclick="aparecerEditar()">Editar perfil</button>
        <button class="button_config">Acessibilidade</button>
        <form action="sair.php">
            <button type="submit" class="button_config">Sair</button>
        </form>
        <button class="button_config_verm">Apagar conta</button>

    </div>

    <div class="editar_perfil" id="editar_perfil">
        <div class="titulo_config center">
            <button class="fechar_voltar" onclick="voltarParaConfig()" id="fechar_editar">⬅ Voltar</button>
            Editar perfil 
            <button class="fechar_voltar" onclick="desaparecerEditarPerfil()" id="fechar">Fechar ✖</button>
        </div>
        <hr class="hr_config">
        <div class="edicao_perfil">
            <div class="edicao_perfil2"></div>
        </div>
    </div>

    <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.php"><img src="images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="entrar">
                        <p ><b>➝ Perfil - ADM</b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
            <div class="d4 center">
                <div class="nome_foto center">
                    <div class="foto">
                        Sua foto aqui
                    </div>
                    <div class="nome"><?php echo $_SESSION['user']?></div>
                </div>
            </div>
            <hr width="60%">
            <div class="d5 center">
                <div class="d6 center">
                    <p class="dados">
                        E-mail: <?php echo $res['email'];?><br><br>
                        Telefone: <?php echo $res['telefone'];?><br><br>
                        Endereço: <?php echo $res['endereco'];?><br><br>
                    </p> 
                    <div class="botoes">
                        <button class="button">Produtos
                        <button class="button_txt">Usuários</button>
                        <button class="button_txt" onclick="aparecerConfig()" id="configuracoes">Configurações</button>
                    </div> 
                </div>
            </div>
            
        </div>
        
        <div class="d3" >
            <div class="footer" onmouseleave="aparecer();" onmouseover="ocultar();">
                <div id="texto_menu" class="texto_menu">⬉⬉Menu⬈⬈</div>
                <div class="menu" id="menu">
                    <div class="branco"> a</div>
                    <a class="voltar" onclick="voltarPagina()"><u><b>⬅ Voltar</b></u></a>
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
    
                    <!-- fezer comentárion no html -->
                    <div class="branco"> a</div>

                </div>
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
    
    function aparecerConfig()
    {
        config.style.display="flex";
    }
    function desaparecerConfig()
    {
        config.style.display = "none";
    }

    function aparecerEditar()
    {
        config.style.display = "none";
        editar_perfil.style.display = "flex";

    }
    function voltarParaConfig()
    {
        editar_perfil.style.display = "none";
        config.style.display = "flex";
    }
    function desaparecerEditarPerfil()
    {
        editar_perfil.style.display = "none";
    }
</script>
</html>