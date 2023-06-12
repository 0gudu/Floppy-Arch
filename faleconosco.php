<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
    <title>FLOPPY ARCH - Fale conosco</title>
    <link rel="stylesheet" href="css/faleconosco.css" /> 
</head>
<body>
  <div class="titulo center">
    <a href="index.html"><img src="images/floppy_arch_title.png" width="100%"></a><p class="p">➝ Fale conosco</p>
  </div>
  <div class="meio">
    <div class="disquete center">
      <img src="images/disquete.gif" class="floppy_disk" width="70%">
      </div>
      <div id="resposta" class="resposta">  </div>
      <div class="disquete center">
      <img src="images/disquete.gif" class="floppy_disk" width="70%">
    </div>
    </div>
    <div class="digitar center">
      <a class="voltar" onclick="voltarPagina()"><u><b>⬅ Voltar</b></u></a> <p class="p2">Mensagem: </p> <input type="text" id="mensagem" class="mensagem" width="90%"> <a href="https://pt.piliapp.com/emoji/list/" target="_blank" class="emojis">Emojis</a><button class="enviar" onclick="Enviar();">Enviar</button>
  </div>
</body>

<script>

  topico = "senai/mensagem";  // Variável que ficará no servidor MQTT

  // Conexão:
  client = new Paho.MQTT.Client("broker.hivemq.com", Number(8000), "");

  // Funções executadas quando a conexão é perdida e quando uma mensagem chega:
  client.onConnectionLost = ConexaoPerdida;
  client.onMessageArrived = MensagemRecebida;

  // Função chamada quando a conexão for realizada:
  client.connect({onSuccess:Conectar});

  // A função Conectar deve criar a variável (tópico) no computador remoto:
  function Conectar() {
    
    client.subscribe(topico);  // Tópico (variável) criado no servidor MQTT
    
  }
  
  function ConexaoPerdida(responseObject) {
    if (responseObject.errorCode !== 0) {
      resposta.innerHTML += "Desconectado";
    }
  }

  // Função executada quando a variável (tópico) no servidor receber uma mensagem:
  function MensagemRecebida(message) {
      resposta.innerHTML += "<br><br>" + message.payloadString;
  }

  function Enviar()
  {
    texto = "~ <?php echo $_SESSION['user'];?>  ~ <br>" + "ㅤ↳ㅤ" + mensagem.value;

    message = new Paho.MQTT.Message(texto);
    message.destinationName = topico;
    client.send(message);
  }
  function voltarPagina() 
  {
      window.history.back();
  }
</script>

</html>