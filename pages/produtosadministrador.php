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
    <div class="editar_perfil center" id="editar_perfil">
        <div class="titulo_config center" id="ed_tt">
            Editar Produto
            <button class="fechar_voltar" onclick="desaparecerEditarPerfil()" id="fechar">Fechar ✖</button>
        </div>
        <hr class="hr_config" width="100%">
        <div class="edicao_perfil">
            <div class="edicao_perfil2 center">
                <fieldset class="editar_foto_perfil">
                    <legend>Foto do produto</legend>
                    <input type="file" class="input_imagem" accept="image/*" id="input_ed_img">
                    <p>Garanta que o objetivo da foto esteja no centro da imagem!</p>
                </fieldset>
                <hr width="70%">
                <div class="input_sq center">
                    Título:
                    <input type="text" class="input" id="input_ed_tt" placeholder="Alterar título..."></input>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    Descricao:
                    <textarea min-rows="1" cols="50" id="input_ed_dsc" class="input" placeholder="Alterar descrição..."></textarea>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    <button class="editar_button"><div class="dotted">Concluir</div>
                    <button class="editar_button" onclick="cancelar()">Cancelar
                </div>
            </div>
        </div>
    </div>

    <div class="editar_perfil center" id="adicionarProduto">
        <div class="titulo_config center" id="ed_tt">
            Adicionar Produto
            <button class="fechar_voltar" onclick="desaparecerCriarProduto()">Fechar ✖</button>
        </div>
        <hr class="hr_config" width="100%">
        <div class="edicao_perfil">
            <form class="edicao_perfil2 center" method="POST">
                <fieldset class="editar_foto_perfil">
                    <legend>Foto do produto</legend>
                    <input type="file" class="input_imagem" accept="image/*" id="input_ad_img">
                    <p>Garanta que o objetivo da foto esteja no centro da imagem!</p>
                </fieldset>
                <hr width="70%">
                <div class="input_sq center">
                    Título:
                    <input type="text" class="input" id="input_ad_tt" placeholder="Alterar título..."></input>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    Descricao:
                    <textarea min-rows="1" cols="50" id="input_ad_dsc" class="input" placeholder="Alterar descrição..."></textarea>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    <button class="editar_button"><div class="dotted">Concluir</div>
                    <button class="editar_button" onclick="cancelar()">Cancelar
                </div>
            </form>
        </div>
    </div>
 
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
                    <img class="foto_adm" src="images/adm.png" >
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

    function aparecerEditar(x)
    {
        editar_perfil.style.display = "flex";

    }
    function voltarParaConfig()
    {
        editar_perfil.style.display = "none";
        config.style.display = "flex";
    }
    function desaparecerEditarPerfil()
    {
        editar_perfil.style.display = "none";
        input_ed_img.value="";
        input_ed_tt.value="";
        input_ed_dsc.value="";
    }

    function cancelar()
    {
        input_ed_img.value="";
        input_ad_img.value="";
        input_ed_tt.value="";
        input_ad_tt.value="";
        input_ed_dsc.value=""
        input_ad_dsc.value="";
    }
    function aparecerCriarProduto()
    {
        adicionarProduto.style.display = "flex";
    }
    function desaparecerCriarProduto()
    {
        adicionarProduto.style.display = "none";
    }

    function remover(x) {
        // Enviar o valor da variável x para o arquivo PHP via AJAX
        $.ajax({
            url: 'seu_arquivo_php.php',
            method: 'POST',
            data: { id_produto: x },
            success: function(response) {
                // Lógica de sucesso, se necessário
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Lógica de tratamento de erro, se necessário
                console.log(error);
            }
        });

    }
</script>
</html>