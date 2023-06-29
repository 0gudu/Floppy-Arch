<?php
    session_start();
    $codigo = $_GET["codigo"];

    include ("../includes/conecta.php");
    $comando = $pdo->prepare("SELECT * FROM produtos WHERE id_produto = :user");
    $comando->bindParam(':user', $codigo);
    $comando->execute();    
                    
    while ($linhas = $comando->fetch()) {
        $imagem = $linhas["foto"];
        $titulo = $linhas["nome"];
        $info = $linhas["descricao"];

        $i = base64_encode($imagem);                    
        
    }   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floppy Arch</title>
    <link rel="stylesheet" href="../css/disquetec.css"/> 
</head>
<body>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                <a href="index.php"><img src="../images/floppy_arch_title.png" width="100%"></a>
                </div>
                <div class="comprar">
                    <p ><b>➝Disquete</b></p>    
                </div>
            </div>
        </div>
        <div class="d2">
            <div class="d21">
                <div class="disc_titulo">
                   <u><b><?php echo($titulo); ?></b></u>
                </div>
                <div class="disc_baixo">
                    <div class="disc_img">
                    <?php echo '<img src="data:image/jpeg;base64,' . $i . '" style="width: 20rem; height: 20rem;">'; ?>
                    </div>
                    <div class="disc_info">
                        <div class="branco">a</div>
                        <div class="discs_nome">
                            <?php echo($info); ?>
                        </div>
                        <div class="discs_capa"> 
                            <u>Capacidade</u>: <select id="ka" onchange="penis()">
                                <option>32gb</option>
                                <option>64gb</option>
                                <option>128gb</option>
                                <option>240gb</option>
                                <option>480gb</option>
                                <option>960gb</option>
                            </select>  

                        </div>
                        <div class="disc_price">
                            Preço ➝ <span id="kk" name="kk" style="color: lightgreen; ">R$40,00</span>
                        </div>
                        <div class="disc_carrinhocompra">
                            <button type="button" class="disc_comprar" onclick="comprarja('<?php echo $_GET['codigo']; ?>')"> <b>COMPRAR</b> </button> 
                            <button type="button" class="disc_carrinho" onclick="botarnocarrinho('<?php echo $_GET['codigo']; ?>')"> <b>COLOCAR NO CARRINHO</b> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include("../includes/menu.php");?>
    </div>  
</body>
<script src="../js/paginadisquete.js"></script>
<script>
function botarnocarrinho(x) {
    if ("<?php echo $_SESSION['user']; ?>" === "none") {
        alert("Primeiramente faça login");
        window.open("../pages/entrar.php","_self");
    }else {
        var valor = document.getElementById("kk").textContent;  
        var url = "../phpscripts/colocarnocarrinho.php?codigo=" + encodeURIComponent(x) + "&valor=" + encodeURIComponent(valor) + "&user=" + "<?php echo $_SESSION['user']; ?>";
        window.open(url, "_self");
    }
    
}
function comprarja(x){
    if ("<?php echo $_SESSION['user']; ?>" === "none") {
        alert("Primeiramente faça login");
        window.open("../pages/entrar.php","_self");
    }else {
        var valor = document.getElementById("kk").textContent;  
        var url = "../phpscripts/pedidocomprarja.php?codigo=" + encodeURIComponent(x) + "&valor=" + encodeURIComponent(valor) + "&user=" + "<?php echo $_SESSION['user']; ?>";
        window.open(url, "_self");
    }
}
</script>
</html>