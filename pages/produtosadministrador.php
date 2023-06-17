<?php 
    session_start();
    $preco = 0;
    
    include("../phpscripts/carrinho_precototal.php");
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
    <div class="editar_perfil" id="editar_perfil">
        <div class="titulo_config center">
            <button class="fechar_voltar" onclick="voltarParaConfig()" id="fechar_editar">⬅ Voltar</button>
            Editar Perfil
            <button class="fechar_voltar" onclick="desaparecerEditarPerfil()" id="fechar">Fechar ✖</button>
        </div>
        <hr class="hr_config">
        <div class="edicao_perfil">
            <div class="edicao_perfil2 center">
                <fieldset class="editar_foto_perfil">
                    <legend>Foto de perfil</legend>
                    <input type="file" class="input_imagem" accept="image/*">
                    <p>Garanta que você ou o objetivo da foto esteja no centro da imagem!</p>
                </fieldset>
                <hr width="70%">
                <div class="input_sq center">
                    Nome:
                    <textarea min-rows="1" cols="50" class="input" placeholder="Alterar o nome..."></textarea>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    Telefone:
                    <input type="text" class="input" placeholder="Alterar a senha..."></input>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    Endereço:
                    <textarea min-rows="1" cols="50" class="input" placeholder="Alterar o endereço..."></textarea>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    Senha:
                    <input type="password" class="input" placeholder="Alterar a senha..."></input>
                </div>
                <hr width="70%">
                <div class="input_sq center">
                    <button class="editar_button"><div class="dotted">Concluir</div>
                    <button class="editar_button">Cancelar
                </div>
            </div>
        </div>
    </div>
   <div class="d0">
        <div class="d1">
            <div class="tits">
                <div class="titulo">
                    <div class="flop">
                        <a href="index.html"><img src="images/floppy_arch_title.png" width="100%"></a>
                    </div>
                    <div class="criar_conta">
                        <p ><b>➝ Produtos </b></p>    
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="d2">
            <div class="d222">
                <div class="cima">
                    <img class="foto_adm" src="images/adm.png" >
                    <p class="nome_adm">João Victor Ferreira </p>
                </div>
                <hr class="hr1">
                    <p class="nome_adm">Produtos ➝</p>
                    <a href="criarconta.html"><Button class="adicionar">Adicionar Produto +</Button></a>
            </div>
            <hr class="hr2">
            <div class="d21">

            <?php include("../phpscripts/produtosadministrador_items.php");?>

            </div>
            
        </div>
        
        <div class="d3" >
            <div class="footer" onmouseleave="aparecer();" onmouseover="ocultar();">
                <div id="texto_menu" class="texto_menu">⬉⬉Menu⬈⬈</div>
                <div class="menu" id="menu">
                    <div class="branco"> a</div>
                    <a class="voltar" onclick="voltarPagina()"><u><b>⬅ Voltar</b></u></a>
                    <span><u><b><a href="comprar.html" class="menu_amarelo">Comprar</a></b></u></span>
                    <span><u><b><a href="carrinho.html" class="menu_branco">Carrinho</a></b></u></span>
                    <span><u><b><a href="entrar.html" class="menu_amarelo">Entrar</a></u></b></span>
                    <span><u><b><a href="contato.html" class="menu_branco">Contato</a></u></b></span>
                    <span><u><b><a href="faleconosco.html" class="menu_branco">Fale conosco</a></u></b></span>
    
                    <!-- fezer comentárion no html -->
                    <div class="branco"> a</div>

                </div>
            </div>
        </div>
    </div>  
</body>
<script>
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

    function mostrarMais(x)
    {
        x.style.display="none";
        x.style.display="block";
        dados.style.width="100%";       
        pic.style.height="9.7rem";
        pic.style.width="9.7rem";
        pic.style.minWidth="9.7rem";
        dadosProd.style.display="block";
    }
    function mostrarMenos()
    {
        mostrarMaisBt.style.display="block";
        mostrarMenosBt.style.display="none";
        dados.style.width="90%";
        pic.style.height="5.7rem";
        pic.style.width="5.7rem";
        pic.style.minWidth="5.7rem";
        dadosProd.style.display="none";
    }

    function aparecerEditar()
    {
        config.style.display = "none";
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
    }
</script>
</html>