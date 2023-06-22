<?php
    include("../includes/conecta.php");
    session_start();
    $imagem = file_get_contents($_FILES["imagem"]["tmp_name"]);
    $comando = $pdo->prepare("UPDATE pessoas SET foto = :foto WHERE nome = :nomes");
    $comando->bindParam(":foto", $foto, PDO::PARAM_LOB);
    $comando->bindParam(":nomes", $_SESSION['user']);
    $resultado = $comando->execute();
    header("location: ../pages/perfil.php");
?>