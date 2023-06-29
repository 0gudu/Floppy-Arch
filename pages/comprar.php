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
    <link rel="stylesheet" href="../css/comprar2.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                    <a href="index.php"><img src="../images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="comprar">
                        <p ><b>➝ Comprar</b></p>    
                    </div>
                </div>
            </div>
        </div>
        <div class="d2">
            <div class="d21">
                <div class="prod">
                <?php 
                    include ("../includes/conecta.php");
                    $comando = $pdo->prepare("SELECT * FROM produtos");
                    $comando->execute();
                
                    $resultado = $comando->execute();

                    while( $linhas = $comando->fetch()) 
                        {
                            $idprod = $linhas["id_produto"]; //nome da coluna xampp
                            $nome = $linhas["nome"];
                            $dados_imagem = $linhas["foto"];
                            
                            $i = base64_encode($dados_imagem);
                            
                            echo('
                                <div onclick="Enviar(' . $idprod . ');" class="itemshowcase">
                                <div class="disqueteshowcase">
                                    <img src="data:image/jpeg;base64,' . $i . '" width="90%" height="85%">
                                </div>
                                <div class="legendashowcase">
                                    <u><b><p class="legendap">' . $nome . '</p></b></u>
                                </div>
                                </div>
                            ');


                        }
                ?>
                </div>
            </div>
        </div>
        
        <?php include("../includes/menu.php"); ?>
    </div>  
</body>
<script>
    function Enviar(codigo) {

        window.open("pagina_disquete.php?codigo="+codigo,"_self")
    }
</script>
</html>