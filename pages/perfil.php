<?php 
    session_start();
    if($_SESSION['user'] == "none"){
        header("location: entrar.php");
    }
    include ("../includes/conecta.php");
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
    <link rel="Websitr Icon" type="gif">
    <title>Perfil - FOPPY ARCH</title>
    <link rel="stylesheet" href="../css/perfil.css" /> 
</head>
<body>
    <div class="config" id="config">
        <div class="titulo_config center">
            Configurações 
            <button class="fechar_voltar" onclick="desaparecerConfig()" id="fechar">Fechar ✖</button>
        </div>
        <hr class="hr_config">
        <button class="button_config" onclick="aparecerEditar()" id="botao_editar_perfil">Editar perfil</button>
        <button class="button_config">Acessibilidade</button>
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
                <fieldset class="editar_foto_perfil">
                    <legend>Foto de perfil</legend>
                    <input type="file" class="input_imagem" accept="image/*">
                    <p>Garanta que você ou o objetivo da foto esteja no centro da imagem!</p>
                </fieldset>
                <hr width="70%">
                <div class="input_sq center">
                    Nome:
                    <textarea min-rows="1" cols="50" class="input" placeholder="Alterar o nome..."></textarea>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    Telefone:
                    <input type="text" class="input" placeholder="Alterar a senha..."></input>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    Endereço:
                    <textarea min-rows="1" cols="50" class="input" placeholder="Alterar o endereço..."></textarea>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    Senha:
                    <input type="password" class="input" placeholder="Alterar a senha..."></input>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    <button class="editar_button"><div class="dotted">Concluir</div>
                    <button class="editar_button">Cancelar
                </div>
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
                        <p ><b>➝ Perfil</b></p>    
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
                        <a href="verpedidos.php" class="href_pedidos"><button class="button">Pedidos</button></a>
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