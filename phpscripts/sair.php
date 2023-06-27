<?php 
    session_start();

    $_SESSION['user'] = "none";

    header("location: ../pages/entrar.php")
?>