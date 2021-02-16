var acao = 'login';
function geraForm(tipo){
    if(tipo == 'login'){
        var HTML = "<h2 style='margin-top:15%;' >Faça o login</h2>"
            +"<br/> <input class = 'form-control' type = 'email' name = 'email' id = 'email' placeholder = 'E-mail' required>"
            +"<br/> <input class = 'form-control' type = 'password' name = 'senha' id = 'senha' placeholder = 'Senha' required>"
            +"<br/> <button class = 'btn btn-outline-danger' type = 'reset'>Limpar</button>"
            +"&nbsp; <button class = 'btn btn-outline-primary'>Enviar</button>"
            +"<br/> <span style='margin-left:78%;'> Novo na plataforma? <a href= '#' onclick = \"geraForm('cadastro')\"> Registrar-se </a> </span>";

        acao = 'login';
    }else if(tipo == 'cadastro'){
        var HTML = "<h2 style='margin-top:15%;' >Faça o cadastro</h2>"
            +"<br/> <input class = 'form-control' type = 'text' name = 'cpf' id = 'cpf'  placeholder = 'CPF' required>"
            +"<br/> <input class = 'form-control' type = 'text' name = 'nome' id = 'nome' placeholder = 'Nome' required>"
            +"<br/> <input class = 'form-control' type = 'email' name = 'email' id = 'email' placeholder = 'E-mail' required>"
            +"<br/> <input class = 'form-control' type = 'password' name = 'senha' id = 'senha' placeholder = 'Senha' required>"
            +"<br/> <input class = 'form-control' type = 'password' name = 'confirmacao_senha' id = 'confirmacao_senha' placeholder = 'Confirmação de senha' required>"      
            +"<br/> <button class = 'btn btn-outline-danger' type = 'reset'>Limpar</button>"
            +"&nbsp; <button class = 'btn btn-outline-primary'>Enviar</button>"
            +"<br/> <span style='margin-left:85%;'> Já se cadastrou? <a href= '#' onclick = \"geraForm('login')\"> Login </a> </span>";

        acao = 'cadastro';
    }

    $("#form").html(HTML);
}

function submitForm(){
    event.preventDefault();

    if(acao == 'login'){
        let dados = {
            'method': 'get',
            'resource': 'login',
            'email': $("input[name=email]").val(),
            'senha': $.md5($("input[name=senha]").val())
        };

        $.post('resources.php', dados, function(response){
            console.log(response);
            response = JSON.parse(response);

            if(response.code == 300){
                window.location.href = response.location;
            }else if(response.code == 400){
                console.log(response.message);
            }
        });
    }else if(acao == 'cadastro'){
        let dados = {
            'method': 'post',
            'resource': 'cadastro',
            'cpf': $("input[name=cpf]").val(),
            'nome': $("input[name=nome]").val(),
            'email': $("input[name=email]").val(),
            'senha': $.md5($("input[name=senha]").val())
        };

        $.post('resources.php', dados, function(response){
            response = JSON.parse(response);

            if(response.code == 300){
                window.location.href = response.location;
            }else if(response.code == 400){
                console.log(response.message);
            }
        });
    }

}
