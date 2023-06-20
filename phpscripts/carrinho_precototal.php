<?php    
    include ("../includes/conecta.php");
    $comando = $pdo->prepare("SELECT * FROM carrinho WHERE usuario = :user and pedido = 20");
    $comando->bindParam(':user', $_SESSION['user']);
    $comando->execute();    
                    
    $resultado = $comando->execute();

    while( $linhas = $comando->fetch()) 
        {
            $m = $linhas["id_coisa"]; //nome da coluna xampp
            $n = $linhas["item"];

            $sql = "SELECT nome FROM produtos WHERE id_produto = :elemento";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':elemento', $n);

            // Executando a consulta
            $stmt->execute();

            $sq = "SELECT valor FROM carrinho WHERE id_coisa = :elemento";
            $stm = $pdo->prepare($sq);
            $stm->bindParam(':elemento', $m);

            // Executando a consulta
            $stm->execute();

            // Obtendo o resultado
            $resultado1 = $stm->fetchColumn();
            switch ($resultado1) {
                case 40;
                    $preco += 40;
                    break;
                case 60;
                    $preco += 60;
                    break;
                case 90:
                    $preco += 90;
                    break;
                case 140:
                    $preco += 140;
                    break;
                case 200:
                    $preco += 200;
                    break;
                case 500:
                    $preco += 500;
                    break;

            }
        }
        ?>