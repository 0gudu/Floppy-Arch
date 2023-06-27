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
    <div class="editar_perfil center" id="editarProduto" style="display: flex;">
        <div class="titulo_config center" id="ed_tt">
            Editar Produto
        </div>
        <hr class="hr_config" width="100%">
        <div class="edicao_perfil">
            <form class="edicao_perfil2 center" method="POST" action="../phpscripts/editarprodutos.php">
                <fieldset class="editar_foto_perfil">
                    <legend>Foto do produto</legend>
                    <input type="file" class="input_imagem" accept="image/*" id="input_ed_img" name="imagem">
                    <p>Garanta que o objetivo da foto esteja no centro da imagem!</p>
                </fieldset>
                <hr width="70%">
                <div class="input_sq center">
                    Título:
                    <input type="text" class="input" id="input_ed_tt" placeholder="Alterar título..." name="titulo"></input>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    Descricao:
                    <textarea min-rows="1" cols="50" id="input_ed_dsc" class="input" placeholder="Alterar descrição..." name="descricao"></textarea>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    <button class="editar_button"><div class="dotted">Concluir</div>
                    <button class="editar_button" onclick="cancelar()">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

</body>
<script>
  

    function cancelar()
    {
        input_ed_img.value="";
        input_ed_tt.value="";
        input_ed_dsc.value="";

        window.open("produtosadministrador.php","_self");
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
</script>
</html>