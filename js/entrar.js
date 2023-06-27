    name = 0;
    
    function ficar() { 
        const xhttp = new XMLHttpRequest();
        nome = document.getElementById("vsf");
        senha = document.getElementById("sifude");
        xhttp.onreadystatechange = function() {
            if(xhttp.responseText == 1){
                name = 1; 

            } else {
                name = 0;
            }
            
        };
        xhttp.open("GET", "../phpscripts/vernome.php?q="+document.getElementById("vsf").value+"&e="+document.getElementById("sifude").value);
        xhttp.send();
    }

    function clicko(){
        

        console.log(name);

        if (name == 1) {
            document.getElementById("conf").style.display = "none";
            var form = document.createElement("form");
            form.method = "post";
            form.action = "../phpscripts/login.php";

            var campoCodigo = document.createElement("input");
            campoCodigo.type = "hidden";
            campoCodigo.name = "codigo";
            campoCodigo.value = vsf.value;
            form.appendChild(campoCodigo);

            document.body.appendChild(form);
            form.submit();

        } else {
            document.getElementById("conf").style.display = "flex";
            nome.value = "";
            senha.value = "";
        }
    }