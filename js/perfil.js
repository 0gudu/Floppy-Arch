function aparecerConfig()
    {
        config.style.display="flex";
    }
    function desaparecerConfig()
    {
        config.style.display = "none";
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