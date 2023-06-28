<?php
include("../includes/conecta.php");

$nome = $_POST["nome"];
$foto = $_POST["foto"];
$descricao = $_POST["descricao"];

$comando = $pdo->prepare("INSERT INTO produtos (nome, foto, descricao) VALUES (:nome, :foto, :descricao)");
$comando->bindParam(":nome", $nome);
$comando->bindParam(":foto", $foto);
$comando->bindParam(":descricao", $descricao);

$resultado = $comando->execute();

// Verifica se a inserção foi bem-sucedida
if ($resultado) {
    // Redireciona para a página de adicionar produtos
    header("Location: ../pages/addprodutos.php");
    exit(); // Encerra o script após o redirecionamento
} else {
    // Trata algum erro na inserção
    echo "Ocorreu um erro ao adicionar o produto.";
}
?>