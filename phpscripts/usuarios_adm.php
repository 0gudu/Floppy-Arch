<?php
                    include ("../includes/conecta.php");
                        $comando = $pdo->prepare("SELECT * FROM pessoas WHERE adm < 1212 and nome <> :nome");
                        $comando->bindParam(":nome", $_SESSION['user']);
                        $comando->execute(); 
                    
                        $resultado = $comando->execute();

                        while( $linhas = $comando->fetch()) 
                            {
                                $email = $linhas['nome'];
                                $nome = $linhas['email'];
                                $foto = $linhas['foto'];
                                $adm = $linhas['adm'];
                                $i = base64_encode($foto);
                                echo '<div class="perfil">';
                                echo '<div class="imagem">';
                                    echo "<img src='data:image/jpeg;base64,$i' class='db_foto'> ";
                                echo '</div>';
                                echo '<div class="cimabaixo">
                                    <p class="nome_perfil">';
                                if($adm == 1){
                                    echo "ADM - ";
                                }
                                echo $nome . '</p>
                                    <div class="botoes_perfil">';
                                echo '<div class="href_perfil" onclick="editar(\'' . $email . '\')">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Ver Perfil</div><button onclick="remover(\'' . $email . '\')"
                                    class="botao_removerperfil">Remover perfil</button>';

                                echo '</div>
                                    </div>
                                </div>
                                <hr class="hr3"> ';

                            }

                ?>