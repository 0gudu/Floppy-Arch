<?php
    include("../includes/conecta.php");
    session_start();
    $nome = $_SESSION['user'];
    $imagem = file_get_contents($_FILES["imagem"]["tmp_name"]);


    $comando = $pdo->prepare("UPDATE pessoas SET foto = :foto where nome = :nome");
    $comando->bindParam(":foto", $imagem, PDO::PARAM_LOB);
    $comando->bindParam(":nome", $nome);
    $resultado = $comando->execute();
    header("location: ../pages/perfil.php");
?>