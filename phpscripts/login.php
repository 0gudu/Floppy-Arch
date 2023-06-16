<?php 
    include("../includes/conecta.php");
    session_start();
    
    $codigo = $_POST["codigo"];

    $comando = $pdo->prepare("SELECT email FROM pessoas WHERE nome = :email;");
    $comando->bindParam(':email', $codigo);
    $comando->execute();
    
    $name = $comando->fetchColumn();
    
    $_SESSION['user'] = $codigo;
    $_SESSION['name'] = $name;

    header("location: ../pages/index.php");
?>