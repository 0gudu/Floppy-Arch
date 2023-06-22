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
        document.getElementById("img").value = "";
        document.getElementById("nm").value = "";
        document.getElementById("tf").value = "";
        document.getElementById("end").value = "";
        document.getElementById("sn").value = "";
    }

    function cancelar()
    {
        document.getElementById("img").value = "";
        document.getElementById("nm").value = "";
        document.getElementById("tf").value = "";
        document.getElementById("end").value = "";
        document.getElementById("sn").value = "";
    }