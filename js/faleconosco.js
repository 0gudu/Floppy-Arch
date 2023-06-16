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