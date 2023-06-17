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
    <link rel="stylesheet" href="../css/pagamentoboleto.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.html"><img src="../images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="criar_conta">
                        <p ><b>➝ Pagamento (boleto)</b></p>    
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
                    <img src="../images/barcode.png" width="100%">
                    <button href="contaacessada.html" type="button" class="button" id="btn" onclick="copiarTexto();">Copiar Codigo</button>
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
    function copiarTexto() {
  var texto = "curioso que leu"; // O texto que você deseja copiar

  // Cria um elemento de entrada temporário
  var elementoTemporario = document.createElement('textarea');
  elementoTemporario.value = texto;

  // Adiciona o elemento de entrada temporário ao DOM
  document.body.appendChild(elementoTemporario);

  // Seleciona o conteúdo do elemento de entrada
  elementoTemporario.select();

  // Executa o comando de cópia na área de transferência
  document.execCommand('copy');

  // Remove o elemento de entrada temporário do DOM
  document.body.removeChild(elementoTemporario);

  // Altere o texto do botão para indicar que foi copiado
  document.getElementById('btn').textContent = 'Copiado!';

  setTimeout(pago(),1000000);

}

function pago(){
    var url = "../phpscripts/pagarpedido.php?pedido=<?php echo $pedido; ?>&valor=<?php echo $valor; ?>&user=<?php echo $_SESSION['user']; ?>";
    window.open(url, "_self");
}
</script>
</html>