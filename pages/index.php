<?php
session_start();

if (!isset($_SESSION['first_visit'])) {
    // Perform actions for the first visit
    $_SESSION['first_visit'] = true;
    $_SESSION["user"] = "none";

} 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOPPY ARCH - Início</title>
    <link rel="stylesheet" href="../css/index.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <img src="../images/floppy_arch_title.png">
                </div>
                <div class="wf">
                    <div class="mundo">
                        <img src="../images/MVUH3J2T.gif">
                    </div>
                    <img src="../images/World_Famous_title.png" >
                    <div class="mundo">
                        <img src="../images/MVUH3J2T.gif">
                    </div>
                </div>
            </div>
            

        </div>
        <div class="d2">
            <div class="d222">
                <img src="../images/disquete.gif" class="floppy_disk">
            </div>
            <div class="d21">
                <img src="../images/neymar_gold.png" class="neymar">
            </div>
            <div class="d22">
                <h1 class="into">Um produto que visa a nostalgia juntamente a viabilidade de armazenamento em seu sistema, com isso em mente apresentamos uma nova geração de disquetes.</h1>
            </div>
            <div class="d222">
                <img src="../images/disquete.gif" class="floppy_disk">
            </div>
        </div>
        
        <?php include("../includes/menu.php"); ?>
    </div>  
</body>
</html>