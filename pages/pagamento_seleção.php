<?php 
    session_start();
    $pedido = $_GET["pedido"];
    $valor = $_GET["valor"];
    $user = $_GET["user"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floppy Arch</title>
    <link rel="stylesheet" href="../css/pagamento.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.php"><img src="../images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="titulopag">
                        <p ><b>➝ Pagamento</b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">

            <div class="totalval">Total: <b style="color: rgb(10, 230, 10);">R$<?php echo $valor;?>,00</b></div>

            <div class="embaixo">

                <div class="d222">
                    <img src="../images/disquete.gif" width="70%">
                </div>

                <div class="metodos">
                    
                    <fieldset class="escolha">
                        
                        <div class="textometo">Metodos de Pagamento:</div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between; width: 80%; height: 23%; ">
                            <div class="metodo" onclick="pagamento('pagamento_cartao.php')"><a style="color: yellow;" >Cartao</a></div>
                            <div class="metodo" onclick="pagamento('pagamento_pix.php')"><a style="color: yellow;" >Pix</a></div>
                            <div class="metodo" onclick="pagamento('pagamento_boleto.php')"><a style="color: yellow;">Boleto</a></div>
                        </div>
                    </fieldset>
                    
                </div>

                <div class="d222">
                    <img src="../images/disquete.gif" width="70%">
                </div>

            </div>

        </div>
        
        <?php include("../includes/menu.php");?>
    </div>  
</body>
<script>
    function pagamento(x){
        var url = x + "?pedido=<?php echo $pedido; ?>&valor=<?php echo $valor; ?>&user=<?php echo $_SESSION['user']; ?>";
        window.open(url, "_self");
    }
</script>
</html>