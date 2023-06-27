<?php 
    session_start();
    if($_SESSION['user'] == "none"){
        header("location: entrar.php");
    }

    include ("../includes/conecta.php");
    $comando = $pdo->prepare("SELECT * FROM pessoas WHERE nome = :user");
    $comando->bindParam(':user', $_GET['codigo']);
    $comando->execute();
    $res =$comando->fetch();
    
    $cu = $_GET['codigo'];
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
            Editar Informações 
            <button class="fechar_voltar" onclick="desaparecerConfig()" id="fechar">Fechar ✖</button>
        </div>
        <hr class="hr_config">
        <button class="button_config" onclick="aparecerEditar()" id="botao_editar_perfil">Editar perfil</button>
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
                <form action="../phpscripts/adm_editarperfil.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $cu;?>" name="user">
                    <fieldset class="editar_foto_perfil">
                        <legend>Foto de perfil</legend>
                        <input type="file" name="imagem" class="input_imagem" accept="image/*" >
                        <p>Garanta que você ou o objetivo da foto esteja no centro da imagem!</p>
                        <button type="submit" class="editar_button"><div class="dotted">enviar</div>
                    </fieldset>
                    <hr width="70%">
                    <div class="input_sq center">
                        Nome:
                        <textarea min-rows="1" cols="50" class="input" placeholder="<?php echo $res['email'];?>..." name="nome"></textarea>
                    </div>
                    <hr width="70%">
                    <div class="input_sq center">
                        Telefone:
                        <input type="number" class="input" placeholder="<?php echo $res['telefone'];?>..."name="telefone"></input>
                    </div>
                    <hr width="70%">
                    <div class="input_sq center">
                        Endereço:
                        <textarea min-rows="1" cols="50" class="input" placeholder="<?php echo $res['endereco'];?>..."name="endereco"></textarea>
                    </div>
                    <hr width="70%">
                    <div class="input_sq center">
                        Senha:
                        <input type="password" class="input" placeholder="Alterar sua senha" name="senha"></input>
                    </div>
                    <hr width="70%">
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
                        <p ><b>➝ Perfil</b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
            <div class="d4 center">
                <div class="nome_foto center">
                    <div class="foto">
                        <?php
                        $i = base64_encode($res['foto']);
                        echo("<img src='data:image/jpeg;base64,$i' width='100%'> ");
                        ?>
                    </div>
                    <div class="nome"><?php if($res['adm'] == 1){echo "adm - ";} echo $res['email'];?></div>
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
                        <form action="verpedidos_adm.php" method="POST">
                            <input type="hidden" value="<?php echo $cu;?>" name="user">
                            <a class="href_pedidos"><button type="submit" class="button">Ver Pedidos</button></a>
                        </form>
                        <button onclick="adm('<?php echo $res['adm'];?>','<?php echo $res['nome'];?>')" id="admt"><?php if($res['adm'] == 1) {
                                echo "Remover Adm";
                            }else {
                                echo"Tornar Adm";
                            }?></button>
                        <button class="button_txt" onclick="aparecerConfig()" id="configuracoes">Editar Perfil</button>
                    </div> 
                </div>
            </div>
            
        </div>
        
        <?php include("../includes/menu.php");?>
    </div>  
</body>
<script src="../js/perfil.js"></script>
<script>
    function adm(x,y){
        window.open("../phpscripts/tornaradm.php?amd=" + x + "&user=" + y, "_self");
    }
</script>
</html>