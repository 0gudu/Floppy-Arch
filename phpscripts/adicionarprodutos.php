<?php
include("../includes/conecta.php");

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];

// Verifica se um arquivo de imagem foi enviado
if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === 0) {
    $foto = $_FILES["foto"]["tmp_name"];
    $foto_contents = file_get_contents($foto);
} else {
    // Trata o erro, se necessário, ou define um valor padrão para a foto
    $foto_contents = null; // Ou defina um valor padrão para a foto no banco de dados
}

$comando = $pdo->prepare("INSERT INTO produtos (nome, foto, descricao) VALUES (:nome, :foto, :descricao)");
$comando->bindParam(":nome", $nome);
$comando->bindParam(":foto", $foto_contents, PDO::PARAM_LOB); // Use PDO::PARAM_LOB para dados BLOB
$comando->bindParam(":descricao", $descricao);

$resultado = $comando->execute();

// Verifica se a inserção foi bem-sucedida
if ($resultado) {
    // Redireciona para a página de adicionar produtos
    header("Location: ../pages/produtosadministrador.php");
    exit(); // Encerra o script após o redirecionamento
} else {
    // Trata algum erro na inserção
    echo "Ocorreu um erro ao adicionar o produto.";
}
?>