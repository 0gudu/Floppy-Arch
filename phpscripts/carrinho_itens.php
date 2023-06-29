<?php
                    include ("../includes/conecta.php");
                        $comando = $pdo->prepare("SELECT * FROM carrinho WHERE usuario = :user AND pedido = 20");
                        $comando->bindParam(':user', $_SESSION['user']);
                        $comando->execute(); 
                    
                        $resultado = $comando->execute();

                        while( $linhas = $comando->fetch()) 
                            {
                                $m = $linhas["id_coisa"]; //nome da coluna xampp
                                $n = $linhas["item"];
                                
                                $c = $pdo->prepare("SELECT foto FROM produtos WHERE id_produto = :prod");
                                $c->bindParam(':prod', $n);
                                $c->execute();

                                $res = $c->fetchColumn();
                                $dados_imagem = $res;
                            
                                $i = base64_encode($dados_imagem);
                

                                                            echo('
                                <div class="perfil">
                                    <img src="data:image/jpeg;base64,' . $i . '" class="fotos_perfis">
                                    <div class="cimabaixo">
                                        <p class="nome_perfil">');
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

                                        <div class="botoes_carrinho ">
                                            <div class="butones">
                                                <div class="montedebotao">
                                                    <button class="button_remover center" onclick="Enviar(\'' . $m . '\')">Remover</button>
                                                    <button href="pagina_disquete.php" class="ver_prod" onclick="verprod(' . $n . ')">Ver produto</button>
                                                </div>
                                                <p class="valor_prod">R$' . $resultado1 . ',00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr3">
                            ');

                                
                            }

                ?>