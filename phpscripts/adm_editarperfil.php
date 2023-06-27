<?php
    session_start();
    include("../includes/conecta.php");
    
    $nomes = $_POST['user'];
    

    if(isset($_FILES['imagem']['tmp_name']) && !empty($_FILES['imagem']['tmp_name'])) {
        $imagem = file_get_contents($_FILES["imagem"]["tmp_name"]);

        $comando = $pdo->prepare("UPDATE pessoas SET foto = :foto where nome = :nome");
        $comando->bindParam(":foto", $imagem, PDO::PARAM_LOB);
        $comando->bindParam(":nome", $nomes);
        $resultado = $comando->execute();
    }
    

    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        if ($nome != ""){
            $comando = $pdo->prepare("UPDATE pessoas SET email = :nome WHERE nome = :nomes");
            $comando->bindParam(":nome", $nome);
            $comando->bindParam(":nomes", $nomes);
            $resultado = $comando->execute();
        }
        
    }
    
    if(isset($_POST['endereco'])){
        $endereco = $_POST['endereco'];
        if ($endereco != ""){
            $comando = $pdo->prepare("UPDATE pessoas SET endereco = :endereco WHERE nome = :nomes");
            $comando->bindParam(":endereco", $endereco);
            $comando->bindParam(":nomes", $nomes);
            $resultado = $comando->execute();
        }
    } 
    if(isset($_POST['senha']) || $_POST['senha'] = ""){
        $senha = $_POST['senha'];
        if ($senha != ""){
            $comando = $pdo->prepare("UPDATE pessoas SET senha = :senha WHERE nome = :nomes");
        $comando->bindParam(":senha", $senha);
        $comando->bindParam(":nomes", $nomes);
        $resultado = $comando->execute();
        }
    }
    if(isset($_POST['telefone']) || $_POST['telefone'] = ""){
        $telefone = $_POST['telefone'];
        if ($telefone != ""){
            $comando = $pdo->prepare("UPDATE pessoas SET telefone = :telefone WHERE nome = :nomes");
            $comando->bindParam(":telefone", $telefone);
            $comando->bindParam(":nomes", $nomes);
            $resultado = $comando->execute();
        }
    } 
    

        header("location: ../pages/usuarios.php");
    
   

?>