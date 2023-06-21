<?php
                    include ("../includes/conecta.php");
                        echo $cu;
                        $comando = $pdo->prepare("SELECT * FROM carrinho WHERE usuario = :user AND pedido = :pedidoselec");
                        $comando->bindParam(':user', $_SESSION['user']);
                        $comando->bindParam(':pedidoselec', $cu);
                        $comando->execute();    
                    
                        $resultado = $comando->execute();

                        while( $linhas = $comando->fetch()) 
                            {
                                $m = $linhas["id_coisa"]; //nome da coluna xampp
                                $n = $linhas["item"];

                                                            echo('
                                <div class="perfilf">
                                    <img class="fotos_perfis" src="');
                                   

                                    // Preparando a consulta
                                    $sql = "SELECT caminhofoto FROM produtos WHERE id_produto = :elemento";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->bindParam(':elemento', $n);

                                    // Executando a consulta
                                    $stmt->execute();

                                    // Obtendo o resultado
                                    $resultado = $stmt->fetchColumn();
                                    echo("$resultado");

                                    echo ('" width="10%">
                                    <div class="cimabaixof">
                                        <p class="nome_perfilf">');
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
                                            case 40:
                                                $rs = "32gb";
                                            
                                                break;
                                            case 60:
                                                $rs = "64gb";
                                                
                                                break;
                                            case 90:
                                                $rs = "128gb";
                                                
                                                break;
                                            case 140:
                                                $rs = "240gb";
                                                
                                                break;
                                            case 200:
                                                $rs = "480gb";
                                                
                                                break;
                                            case 500:
                                                $rs = "960gb";
    
                                                break;

                                        }
                                        $capacidade = $rs;

                                        
                                        // Obtendo o resultado
                                        $resultado = $stmt->fetchColumn();
                                        echo("$resultado");
                                        echo(" ($capacidade)");
                                        echo('
                                        </p>

                                        <div class="botoes_carrinhof ">
                                            
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr3">
                            ');

                                
                            }

                ?>