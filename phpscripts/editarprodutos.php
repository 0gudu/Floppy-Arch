<?php
include("../includes/conecta.php");

$id = $_POST["prod"]; // Obtém o valor do ID da barra de endereço


// Verifica se um arquivo de imagem foi enviado
if(isset($_FILES['foto']['tmp_name']) && !empty($_FILES['foto']['tmp_name'])) {
    $foto = file_get_contents($_FILES["foto"]["tmp_name"]);
    $comando = $pdo->prepare("UPDATE produtos SET foto = :foto where id_produto = :id");
    $comando->bindParam(":foto", $foto, PDO::PARAM_LOB);
    $comando->bindParam(":id", $id);
    $resultado = $comando->execute();
}

if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    if ($nome != ""){
        $comando = $pdo->prepare("UPDATE produtos SET nome = :nome WHERE id_produto = :id");
        $comando->bindParam(":nome", $nome);
        $comando->bindParam(":id", $id);
        $resultado = $comando->execute();
    }
    
}

if(isset($_POST['descricao'])){
    $descricao = $_POST['descricao'];
    if ($descricao != ""){
        $comando = $pdo->prepare("UPDATE produtos SET descricao = :descs WHERE id_produto = :id");
        $comando->bindParam(":descs", $descricao);
        $comando->bindParam(":id", $id);
        $resultado = $comando->execute();
    }
    
}

    header("Location: ../pages/produtosadministrador.php");
    exit(); 

?>