name = 0;

    function verificar() { 
        const xhttp = new XMLHttpRequest();
        nome = document.getElementById("email");
        xhttp.onreadystatechange = function() {
            if(xhttp.responseText == 0){
                email.style.color = "green";
                name = 1;
                aviso.style.display = "none";
            } else {
                email.style.color = "red";
                name = 0;
                aviso.style.display = "flex";
            }
            
        };

        xhttp.open("GET", "../phpscripts/verificarnomeemail.php?q="+document.getElementById("email").value+"&e="+document.getElementById("email").value);
        xhttp.send();
    }

    function senhass() {
        senha1 = 0;
        if (senha.value == confirmaa.value) {
            confirmaa.classList.remove('errado');
            confirmaa.classList.add('certo');
            senha1 = 1;
        } else {
            confirmaa.classList.remove('certo');
            confirmaa.classList.add('errado');
            senha1 = 0;
        }

    }

    function enviarver() {

        if (name == 1 && endereco.value != "" && telefone.value != "" && email.value != "" &&  senha1 == 1){
            confirma.type = "submit";
        }
        else {
            alert("veja se voce preencheu todos os campos");
            confirma.type = "button";
        }
    }