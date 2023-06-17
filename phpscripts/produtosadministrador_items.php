<?php
                    include ("../includes/conecta.php");
                        $comando = $pdo->prepare("SELECT * FROM produtos");
                        $comando->execute();    
                    
                        $resultado = $comando->execute();

                        while( $linhas = $comando->fetch()) 
                            {
                                $m = $linhas["descricao"]; //nome da coluna xampp
                                $n = $linhas["nome"];
                                $o = $linhas["img"];
                                $p = $linhas["id_produto"]
                                


                                        echo('
                                        <div class="produto" id="' . $p . '">
                                            <div class="img_titulo" >
                                                <div class="picture" id="pic" style="background-image: url(' . $o . ');"></div>
                                                <div class="dados" id="dados">
                                                    <div class="titulo_produto"><p style="margin: 0%; margin-left: 2%;">' . $n . '</p></div>
                                                    <p class="dados_prod" id="dadosProd">' . $m . '</p>
                                                    <div class="botoes_produto">
                                                        <Button class="button_produto">Remover</Button>
                                                        <Button class="txt_button_produto" onclick="mostrarMais(' . $o . ')" id="mostrarMaisBt">Mostrar mais</Button>
                                                        <Button class="txt_button_produto" onclick="mostrarMenos(' . $o . ')" id="mostrarMenosBt" style="display: none;">Mostrar menos</Button>
                                                        <Button class="txt_button_produto" onclick="aparecerEditar()">Editar</Button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="hr3">
                                        ');
                            }

                ?>