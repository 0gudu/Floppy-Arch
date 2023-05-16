<?php
include ("conecta.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];
$senha = $_POST["endereco"];
$telefone = $_POST["telefone"];

$nomeUsuario = "nome_do_usuario_a_ser_verificado";

// Executa a consulta para verificar se o usuário já existe
$sql = "SELECT * FROM nome_da_tabela WHERE nome = '$nomeUsuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    alert("Usuário já existe no banco de dados");
    header("location: criarconta.html");
} else {
    $comando = $pdo->prepare("INSERT INTO pessoas VALUES('$nome','$email','$endereco', '$senha',$telefone)");
    $resultado = $comando->execute();
    //para voltar ao formulário//
    header("Location: entrar.html");
}




