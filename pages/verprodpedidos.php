<?php 
    session_start();
    $pedido = $_GET['pedido'];
    
    include("../phpscripts/carrinho_precototal.php");
?>

<?php 
    include ("../includes/conecta.php");
    $comando = $pdo->prepare("SELECT * FROM pessoas WHERE nome = :user");
    $comando->bindParam(':user', $_SESSION['user']);
    $comando->execute();
    $res =$comando->fetch();
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Pedidos - FOPPY ARCH</title>
    <link rel="stylesheet" href="../css/editprodutos.css" /> 
</head>
<body>
    <div class="editar_perfil center" id="editarProduto" style="display: flex;">
        <div class="titulo_config center" id="ed_tt">
            Ver pedidos
        </div>
        <hr class="hr_config" width="100%">
        <div class="edicao_perfil">
            <div class="produtos">
                <?php 
                    $comando = $pdo->prepare("SELECT * FROM carrinho WHERE pedido = :pedido");
                    $comando->bindParam(':pedido', $pedido);
                    $comando->execute();

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
                                        

                                        
                                        // Obtendo o resultado
                                        $resultado = $stmt->fetchColumn();
                                        echo("$resultado");
                                        echo(" ($rs)");
                                        echo('
                                        </p>

                                        <div class="botoes_carrinho ">
                                            <div class="butones">
                                                <p class="valor_prod">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspR$' . $resultado1 . ',00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr3">
                            ');

                                
                            }
                ?>
            </div>
                <div class="input_sq1">
                    <button class="editar_button" onclick="voltar()">VOLTAR</button>
                </div>
            </form>
        </div>
    </div>

</body>
<script>
  

    function voltar()
    {
        window.open("verpedidos.php","_self");
    }
</script>
</html>