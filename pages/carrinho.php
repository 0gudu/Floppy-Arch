<?php 
    session_start();
    $preco = 0;
    
    include ("../includes/conecta.php");

    $comando = $pdo->prepare("SELECT * FROM carrinho WHERE usuario = :user and pedido = 0");
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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - FOPPY ARCH</title>
    <link rel="stylesheet" href="../css/carrinho.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                    <a href="index.php"><img src="../images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="criar_conta">
                        <p ><b>➝ Carrinho</b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
        <div class="d222">
                <div class="cima">
                    <img class="foto_adm" src="images/adm.png" >

                </div>
                <div class="cima2">
                    <a href="../index.php" class="sair_alterar">← Sair</a>
                    <a href="../pages/entrar.php" class="sair_alterar">Meu Perfil</a>
                </div>
                <hr class="hr1">
                    <p class="nome_adm">Valor Total ➝ R$<?php echo $preco; ?>,00</p>
                    <Button class="adicionar" onclick="pedido()">Finalizar Compra</Button>
            </div>
            <hr class="hr2">
            <div class="d21" id="puta">
                <?php
                    include ("../includes/conecta.php");
                        $comando = $pdo->prepare("SELECT * FROM carrinho WHERE usuario = :user AND pedido = 0");
                        $comando->bindParam(':user', $_SESSION['user']);
                        $comando->execute();    
                    
                        $resultado = $comando->execute();

                        while( $linhas = $comando->fetch()) 
                            {
                                $m = $linhas["id_coisa"]; //nome da coluna xampp
                                $n = $linhas["item"];

                                                            echo('
                                <div class="perfil">
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

                                    echo ('">
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
                                                    <button href="pagina_disquete.php" class="ver_prod">Ver produto</button>
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
            </div>
            
            
        </div>

        
        <?php echo $preco; ?>
    </div>  
</body>
<script>
    if ("<?php echo $_SESSION['user']; ?>" === "none") {
            alert("Primeiramente faça login");
            window.open("entrar.php","_self");
        }
    function pedido() {
            window.open("../phpscripts/pedidoscarrinho.php?valortota="+<?php echo $preco; ?>,"_self");
    }
    function Enviar(codigo) {
        window.open("../phpscripts/excluir_carrinho.php?codigo="+codigo,"_self")
    }
</script>
</html>
