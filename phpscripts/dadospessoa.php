<?php
    include ("../includes/conecta.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $senha = $_POST["senha"];
    $telefone = $_POST["telefone"];
    $foto = "../images/standard_user_pic.png";

    $dados = file_get_contents($foto);

    $comando = $pdo->prepare("INSERT INTO pessoas VALUES(:email,:nome,:endereco, :senha,:telefone,:foto, :adm)");
    $comando->bindParam(':email', $email);
    $comando->bindParam(':nome', $nome);
    $comando->bindParam(':endereco', $endereco);
    $comando->bindParam(':senha', $senha);
    $comando->bindParam(':telefone', $telefone);
    $comando->bindParam(':foto', $dados);
    $adm = 0;
    $comando->bindParam(':adm', $adm);
    
    $resultado = $comando->execute();
    //para voltar ao formulário//
    header("Location: ../pages/entrar.php");
?>


