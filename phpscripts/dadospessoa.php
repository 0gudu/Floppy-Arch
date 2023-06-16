<?php
    include ("../includes/conecta.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];

    $comando = $pdo->prepare("INSERT INTO pessoas VALUES('$email','$nome','$endereco', '$senha',$telefone,0)");
    $resultado = $comando->execute();
    //para voltar ao formulário//
    header("Location: ../pages/entrar.php");
?>


