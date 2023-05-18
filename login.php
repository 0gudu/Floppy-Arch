<?php 
    session_start();
    $codigo = $_GET["codigo"];

    $_SESSION['user'] = $codigo;

    header("location: index.php");
?>