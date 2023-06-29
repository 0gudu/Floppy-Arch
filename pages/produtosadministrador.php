<?php 
    session_start();
    $preco = 0;
    
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
    <title>Produtos - FOPPY ARCH</title>
    <link rel="stylesheet" href="../css/produtosadministrador.css" /> 
</head>
<body>

 
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.html"><img src="../images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="criar_conta">
                        <p ><b>➝ Produtos - ADM </b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
            <div class="d222">
                <div class="cima">
                    <?php
                        include ("../includes/conecta.php");
                        $comando->execute();    
                                        
                        $resultado = $comando->execute();
                    
                        while( $linhas = $comando->fetch()) 
                        {
                            $n = $linhas["email"]; //nome da coluna xampp
                            $s = $linhas["foto"];
                            $f = base64_encode($s);
                            echo'<img src="data:image/jpeg;base64,' . $f. '" class="picture">';
                        }
                    ?>
                    <p class="nome_adm"><?php echo $res['email'];?> </p>
                </div>
                <hr class="hr1">
                    <p class="nome_adm">Produtos ➝</p>
                    <Button class="adicionar" onclick="aparecerCriarProduto()">Adicionar Produto +</Button>
            </div>
            <hr class="hr2">
            <div class="d21">

                <?php include("../phpscripts/produtosadministrador_items.php");?>

            </div>
        </div>
        
        <?php include("../includes/menu.php"); ?>
    </div>  
</body>
<script>
  

  /*  function mostrarMais(x)
    {
        console.log(x);
        document.getElementById(x).style.display="block";
   }*/

   dadosProd.style.display = "none";

   function mostrarMais(x) {
    var pic = document.getElementById('pic'+ x);
    var dados = document.getElementById("dados" + x);
    var dadosProd = document.getElementById("dadosProd" + x);
    var mostrarMais = document.getElementById("mostrarMais" + x);
    var mostrarMenos = document.getElementById("mostrarMenos" + x);
    var imgTitulo = document.getElementById("imgTitulo" + x);
    console.log(x);
    console.log(pic);
    console.log(dados);
    console.log(dadosProd);
    dadosProd.style.display="flex";
    mostrarMais.style.display="none";
    mostrarMenos.style.display="block";
    imgTitulo.style.height="200px";

    pic.style.width="200px";
    pic.style.heigth="200px";
    
    }

    function mostrarMenos(x) {
        var pic = document.getElementById("pic" + x);
        var dados = document.getElementById("dados" +x);
        var dadosProd = document.getElementById("dadosProd" + x);
        var mostrarMais = document.getElementById("mostrarMais" + x);
        var mostrarMenos = document.getElementById("mostrarMenos" + x);
        var imgTitulo = document.getElementById("imgTitulo" + x);
        console.log(x);
        console.log(pic);
        console.log(dados);
        console.log(dadosProd);
        dadosProd.style.display="none";
        mostrarMais.style.display="block";
        mostrarMenos.style.display="none";
        imgTitulo.style.height="100px";

        pic.style.width="100px";
        pic.style.heigth="100px";
    }


    function Enviar(codigo) {
        window.open("../phpscripts/excluir_produtosadm.php?codigo="+codigo,"_self")
    }

    function aparecerEditar(x)
    {
        var y = "e";
        window.open("editprodutos.php?x=" + x,"_self" );
    }

    function aparecerCriarProduto()
    {
        window.open("addprodutos.php","_self" );
    }
</script>
</html>