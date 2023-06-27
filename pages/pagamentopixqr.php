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
    <title>Pagamento - FLOPPY ARCH</title>
    <link rel="stylesheet" href="../css/pagamentopixqr.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.html"><img src="images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="criar_conta">
                        <p ><b>➝ Pagamento (pix)</b></p>    
                    </div>

                </div>

            </div>
        </div>
        <div class="d2">
            <div class="d222">
                <img src="../images/disquete.gif" width="70%">
            </div>
            <div class="d21">

                <fieldset class="login">

                    <div class="valor_confirmar">
                        <div class="qr_tt">
                            Use o código de QR para o pagamento:
                        </div>
                        <button href="contaacessada.html" type="button" class="button" onclick="confirmar()">Confirmar</button>
                    </div>
                    <div class="qr_code">
                        <img src="../images/PIX_QR.png" width="225%">
                    </div>


                </fieldset>

            </div>
            <div class="d222">
                <img src="../images/disquete.gif" width="70%">
            </div>

        </div>

        <?php include("../includes/menu.php");?>
    </div>  
</body>
<script>
    function confirmar(){
        var url = "../phpscripts/pagarpedido.php?pedido=<?php echo $pedido; ?>&valor=<?php echo $valor; ?>&user=<?php echo $_SESSION['user']; ?>";
        window.open(url, "_self");
    }
</script>
</html>
