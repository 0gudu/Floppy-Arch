<?php
    include("conecta.php");
    $cu = 0;
    $elemento = $_GET['q']; // Ou qualquer outra forma de obter o valor
    $elemento1 = $_GET['e']; // Ou qualquer outra forma de obter o valor

    // Preparando a consulta
    $sql = "SELECT COUNT(*) FROM pessoas WHERE nome = :elemento";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':elemento', $elemento);

    // Executando a consulta
    $stmt->execute();

    // Obtendo o resultado
    $resultado = $stmt->fetchColumn();
    $cu += $resultado;

    


    // Verificando se o elemento já existe no banco de dados
    if ($resultado > 0) {
        echo "1";
    } else {
        echo "0";
    }
?>