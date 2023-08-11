<?php 
    session_start();
    include ("../includes/conecta.php");
    $comando = $pdo->prepare("SELECT adm FROM pessoas WHERE nome = :user");
    $comando->bindParam(':user', $_SESSION['user']);
    $comando->execute();
    $res =$comando->fetch();

    if ($res['adm'] == 0) {
        header("location: entrar.php");
    }
    if($_SESSION['user'] == "none"){
        header("location: entrar.php");
    }
    

    $comando = $pdo->prepare("SELECT adm FROM pessoas WHERE nome = :user");
    $comando->bindParam(':user', $_SESSION['user']);
    $comando->execute();
    $res =$comando->fetch();

    if ($res['adm'] == 0) {
        header("location: entrar.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - FOPPY ARCH</title>
    <link rel="stylesheet" href="../css/usuarios.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.php"><img src="../images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="criar_conta">
                        <p ><b>➝ Usuários</b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
            <div class="d222">
                <div class="cima">
                        <?php
                            $comando = $pdo->prepare("SELECT foto from pessoas WHERE nome = :nome");
                            $comando->bindParam(":nome", $_SESSION['user']);
                            $resultado = $comando->execute();
                            $dados_imagem = $comando->fetchColumn();
                            $i = base64_encode($dados_imagem);
                            echo("<img src='data:image/jpeg;base64,$i' class='db_foto1'> ");
                        ?>
                    <p class="nome_adm"><?php echo $_SESSION['name'];?> </p>
                </div>
                <hr class="hr1">
                    <p class="nome_adm">Perfis ➝</p>
            </div>
            <hr class="hr2">
            <div class="d21">

                <?php include("../phpscripts/usuarios_adm.php")?>

            </div>
            
        </div>
        
        <?php include("../includes/menu.php");?>
    </div>  
</body>
<script>
   function editar(x) {
        var url = "perfil_user.php?codigo=" + x;
        window.open(url, "_self");
    }
    function remover(x) {
        var url = "../phpscripts/remover_user.php?codigo=" + x;
        window.open(url, "_self");
    }

</script>
</html>