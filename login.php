<?php 
    session_start();
    $codigo = $_POST["codigo"];

    $_SESSION['user'] = $codigo;

    header("location: index.php");
?>