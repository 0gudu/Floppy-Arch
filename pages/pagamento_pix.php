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
    <link rel="stylesheet" href="../css/pagamentopix.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="../index.html"><img src="../images/floppy_arch_title.png" width="100%"></a>
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
                    <fieldset class="campo">
                        <legend class="legenda">Nome do pagador</legend>
                        <input type="text" class="yuuy" id="nome">
                    </fieldset>
                    <fieldset class="campo">
                        <legend class="legenda">CPF</legend>
                        <input type="text" class="yuuy" id="cpf" onkeyup="validarcpf()">
                    </fieldset>
                    <div class="entrar_criarconta">
                        <button type="button" class="button" onclick="confirmar()">Confirmar</button>
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
    cpf1 = 0;
    function validarcpf() {
        expressao = /^[0-9]{11}$/g;
        resposta = expressao.test(cpf.value);
        if (resposta==true)
        {
            cpf.classList.remove('errado');
            cpf.classList.add('certo');
            cpf1=1;
        }
        if (resposta==false)
        {
            cpf.classList.remove('certo');
            cpf.classList.add('errado');
            cpf1 = 0;
        }
    }
    function confirmar() {
        if (cpf1 == 1 && nome.value != "")
        {
            var url = "pagamentopixqr.php?pedido=<?php echo $pedido; ?>&valor=<?php echo $valor; ?>&user=<?php echo $_SESSION['user']; ?>";
            window.open(url, "_self");
        }
        else {
            alert("complete todos os campos corretamente")
        }

    }
</script>
</html>
