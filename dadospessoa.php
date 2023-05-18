<?php
include ("conecta.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];
$senha = $_POST["senha"];
$telefone = $_POST["telefone"];


    $comando = $pdo->prepare("INSERT INTO pessoas VALUES('$nome','$email','$endereco', '$senha',$telefone)");
    $resultado = $comando->execute();
    //para voltar ao formulário//
    header("Location: entrar.html");


?>


