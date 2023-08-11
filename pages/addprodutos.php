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
    <title>Editar Produtos - FOPPY ARCH</title>
    <link rel="stylesheet" href="../css/editprodutos.css" /> 
</head>
<body>
    <div class="editar_perfil center" id="adicionarProduto" style="display: flex;">
        <div class="titulo_config center" id="ed_tt">
            Adicionar Produto
        </div>
        <hr class="hr_config" width="100%">
        <div class="edicao_perfil">
            <form class="edicao_perfil2 center" method="POST" action="../phpscripts/adicionarprodutos.php" enctype="multipart/form-data">
                <fieldset class="editar_foto_perfil">
                    <legend>Foto do produto</legend>
                    <input type="file" class="input_imagem" accept="image/*" id="input_ad_img" name="foto">
                    <p>Garanta que o objetivo da foto esteja no centro da imagem!</p>
                </fieldset>
                <hr width="70%">
                <div class="input_sq center">
                    Título:
                    <input type="text" class="input" id="input_ad_tt" placeholder="Alterar título..." name="nome"></input>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    Descricao:
                    <textarea min-rows="1" cols="50" id="input_ad_dsc" class="input" placeholder="Alterar descrição..." name="descricao"></textarea>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    <button class="editar_button"><div class="dotted"  onmouseover="concluir()" >Concluir</div>
                    <button class="editar_button" type="button" onclick="cancelar()">Cancelar
                </div>
            </form>
        </div>
    </div>  
</body>
<script>
  

    function cancelar()
    {
        input_ad_img.value="";
        input_ad_tt.value="";
        input_ad_dsc.value="";

        window.open("produtosadministrador.php","_self")
    }
    function aparecerCriarProduto()
    {
        adicionarProduto.style.display = "flex";
    }
    function desaparecerCriarProduto()
    {
        adicionarProduto.style.display = "none";
    }

    function Enviar(codigo) {
        window.open("../phpscripts/excluir_produtosadm.php?codigo="+codigo,"_self")
    }

    function concluir()
    {
        // Obter os valores dos campos
        var nome = document.getElementById("input_ad_tt").value;
        var foto = document.getElementById("input_ad_img").value;
        var descricao = document.getElementById("input_ad_dsc").value;

        // Verificar se os campos estão preenchidos
        if (nome.trim() === "" || foto.trim() === "" || descricao.trim() === "") {
            // Exibir mensagem de erro
            alert("Por favor, preencha todos os campos (nome, foto e descrição) antes de concluir.");
        }
    }
</script>
</html>