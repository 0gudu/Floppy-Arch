<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos - FOPPY ARCH</title>
    <link rel="stylesheet" href="css/pedidos.css" /> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.php"><img src="images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="criar_conta">
                        <p ><b>➝ Pedidos</b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
            <div class="d222">
                <div class="cima">
                    <img class="foto_adm" src="images/adm.png" >
                    <p class="nome_adm"><?php echo $_SESSION['name'];?></p>
                </div>
                <div class="cima2">
                </div>
                <hr class="hr1">
                    <p class="nome_adm">Pedidos ➝</p>
                    <Button class="adicionar" href="criarconta.html" >Cancelar pedidos</Button>
            </div>
            <hr class="hr2">
            <div class="d21">
            <?php
                    include ("conecta.php");

                        $comando = $pdo->prepare("SELECT * FROM pedidos WHERE usuario = :user"); 
                        $comando->bindParam(':user', $_SESSION['user']);
                        $resultado = $comando->execute();

                        while( $linhas = $comando->fetch()) 
                            {
                                $id = $linhas["id_pedido"];
                                $m = $linhas["datas"];
                                $n = $linhas["statuss"];
                                $valortota = $linhas["valor"];
                                echo('
                                
                                <div class="perfil">
                                <div class="cimabaixo">
                                    <p class="tt_pedido">
                                        Pedido (' . $m . ') - ');
                                        if($n == 'n pago'){
                                            echo 'Não pago
                                            </p>
                                            <div class="botoes_perfil">
                                            <button class="button_pedido">Pagar</button>
                                            <button class="button_pedido" onclick="cancelar(' . $id . ')">Cancelar pedido</button>
                                            <a class="href_perfil" onclick="produtosver()">Ver produtos</a>
                                            <div class="preco_valor_preco">
                                                <p class="preco">Valor total:</p>
                                                <p class="valor_preco">R$ ' . $valortota . '
                                                ,00</p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>';
                                        }else 
                                        {
                                            echo 'Pago e não enviado
                                            </p>
                                    <div class="botoes_perfil">
                                        <button class="button_pedido">Confirmar recebimento</button>
                                        <a class="href_perfil" onclick="produtosver()">Ver produtos</a>
                                        <div class="preco_valor_preco">
                                            <p class="preco">Valor total:</p>
                                            <p class="valor_preco">R$ 40,00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                ';
                                        }
                                        

                                    
                            }

                ?>
                
                <hr class="hr3">

            </div>
            
        </div>
        
        <div class="d3">
        <div class="footer" onmouseleave="aparecer();" onmouseover="ocultar();">
                <div id="texto_menu" class="texto_menu">⬉⬉Menu⬈⬈</div>
                <div class="menu" id="menu">
                <div class="branco"> a</div>

                <a class="voltar" style="color: white;" onclick="voltarPagina()"><u><b>⬅ Voltar</b></u></a>
                <span><u><b><a href="comprar.php"  class="menu_amarelo"     id="comprar">Comprar</a></b></u></span>
                <span><u><b><a href="carrinho.php" class="menu_branco" id="menupadrao">Carrinho</a></b></u></span>
                <span><u><b><a href="entrar.php" class="menu_amarelo">
                <?php 
                    if($_SESSION['user'] == "none"){
                        echo "entrar";
                    } else {
                        echo $_SESSION['name'];
                    }
                
                ?>  </a></u></b></span>
                <span><u><b><a href="contato.html" class="menu_branco">Contato</a></u></b></span>
                <span><u><b><a href="faleconosco.php" class="menu_branco">Fale conosco</a></u></b></span>
                  
                </a></u></b></span>

                <div class="branco"> a</div>
            </div>
        </div>
    </div>  
</body>
<script>
    function cancelar(x) {
        window.open("pedidocancelar.php?id="+x,"_self");
    }
    texto_menu.style.display="inline";
    menu.style.display="none";
    function ocultar()
    {
        texto_menu.style.display="none";
        menu.style.display="inline";
    }
    function aparecer()
    {
        texto_menu.style.display="inline";
        menu.style.display="none";
    }        
    function voltarPagina() 
    {
        window.history.back();
    }
</script>
</html>