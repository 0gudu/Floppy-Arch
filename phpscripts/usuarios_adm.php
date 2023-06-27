<?php
                    include ("../includes/conecta.php");
                        $comando = $pdo->prepare("SELECT * FROM pessoas WHERE adm < 1212");
                        $comando->execute(); 
                    
                        $resultado = $comando->execute();

                        while( $linhas = $comando->fetch()) 
                            {
                                $email = $linhas['nome'];
                                $nome = $linhas['email'];
                                $foto = $linhas['foto'];
                                $i = base64_encode($foto);
                                echo '<div class="perfil">';
                                echo '<div class="imagem">';
                                    echo "<img src='data:image/jpeg;base64,$i' width='100%'> ";
                                echo '</div>';
                                echo '<div class="cimabaixo">
                                <p class="nome_perfil">
                                    ' . $nome . '
                                </p>
                                <div class="botoes_perfil">';
                                   echo '<div class="href_perfil" onclick="editar(\'' . $email . '\')">Editar perfil</div><button class="botao_removerperfil">Remover perfil</button>';

                                echo'</div>
                            </div>
                        </div>
                        <hr class="hr3"> ';
                                
                            }

                ?>