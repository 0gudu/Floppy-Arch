<?php 
    session_start();
    if($_SESSION['user'] == "none"){
        header("location: entrar.php");
    }
    include ("../includes/conecta.php");

    $comando = $pdo->prepare("SELECT adm FROM pessoas WHERE nome = :user");
    $comando->bindParam(':user', $_SESSION['user']);
    $comando->execute();
    $res =$comando->fetch();

    if ($res['adm'] == 0) {
        header("location: entrar.php");
    }
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
    <title>Perfil ADM - FOPPY ARCH</title>
    <link rel="stylesheet" href="../css/perfiladministrador.css" /> 
</head>
<body>
    <div class="config" id="config">
        <div class="titulo_config center">
            Configurações 
            <button class="fechar_voltar" onclick="desaparecerConfig()" id="fechar">Fechar ✖</button>
        </div>
        <hr class="hr_config">
        <button class="button_config" onclick="aparecerEditar()">Editar perfil</button>
        <form action="../phpscripts/sair.php">
            <button type="submit" class="button_config">Sair</button>
        </form>
        <button class="button_config_verm">Apagar conta</button>

    </div>

    <div class="editar_perfil" id="editar_perfil">
        <div class="titulo_config center">
            <button class="fechar_voltar" onclick="voltarParaConfig()" id="fechar_editar">⬅ Voltar</button>
            Editar Perfil
            <button class="fechar_voltar" onclick="desaparecerEditarPerfil()" id="fechar">Fechar ✖</button>
        </div>
        <hr class="hr_config">
        <div class="edicao_perfil">
            <div class="edicao_perfil2 center">
            <form action="../phpscripts/editarperfil.php" method="post" enctype="multipart/form-data">
                    <fieldset class="editar_foto_perfil">
                        <legend>Foto de perfil</legend>
                        <input type="file" name="imagem" class="input_imagem" accept="image/*" >
                        <p>Garanta que você ou o objetivo da foto esteja no centro da imagem!</p>
                        <button type="submit" class="editar_button"><div class="dotted">enviar</div>
                    </fieldset>
                    <hr width="86%">
                    <div class="input_sq center">
                        Nome:
                        <textarea min-rows="1" cols="50" class="input" placeholder="<?php echo $res['email'];?>..." name="nome"></textarea>
                    </div>
                    <hr width="85%">
                    <div class="input_sq center">
                        Telefone:
                        <input type="number" class="input" placeholder="<?php echo $res['telefone'];?>..."name="telefone"></input>
                    </div>
                    <hr width="85%">
                    <div class="input_sq center">
                        Endereço:
                        <textarea min-rows="1" cols="50" class="input" placeholder="<?php echo $res['endereco'];?>..."name="endereco"></textarea>
                    </div>
                    <hr width="85%">
                    <div class="input_sq center">
                        Senha:
                        <input type="password" class="input" placeholder="Alterar sua senha" name="senha"></input>
                    </div>
                    <hr width="85%">
                    <div class="input_sq center">
                        <button type="submit" class="editar_button"><div class="dotted">Concluir</div>
                        <button class="editar_button">Cancelar
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.php"><img src="../images/floppy_arch_title.png" width="100%"></a>
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
                    <?php
                        $comando = $pdo->prepare("SELECT foto from pessoas WHERE nome = :nome");
                        $comando->bindParam(":nome", $_SESSION['user']);
                        $resultado = $comando->execute();
                        $dados_imagem = $comando->fetchColumn();
                        $i = base64_encode($dados_imagem);
                        echo("<img src='data:image/jpeg;base64,$i' width='100%'> ");
                        ?>
                    </div>
                    <div class="nome"><?php echo $_SESSION['name'];?></div>
                </div>
            </div>
            <hr width="60%">
            <div class="d5 center">
                <div class="d6 center">
                <p class="dados">
                        E-mail: <?php echo $res['nome'];?><br><br>
                        Telefone: <?php echo $res['telefone'];?><br><br>
                        Endereço: <?php echo $res['endereco'];?><br><br>
                    </p> 
                    <div class="botoes">
                        <a href="produtos_adm.html" class="href_produtos"><button class="button">Produtos</button></a>
                        <a href="usuarios.php" class="button_txt">Usuários</a>
                        <button class="button_txt" onclick="aparecerConfig()" id="configuracoes">Configurações</button>
                    </div> 
                </div>
            </div>
            
        </div>
        
        <?php include("../includes/menu.php");?>
    </div>  
</body>
<script src="../js/perfil.js"></script>
</html>