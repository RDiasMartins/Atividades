<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela g&ecircnero - Cadastro </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
    </head>
    <body>
        <div class="container-fluid">
            <?php
                include "menu.inc";
            ?>

            <center>
            <div class="form-generico col-sm-6">
                <h4 style="color:black; font-family:Consolas;"> CADASTRAR G&EcircNERO: </h3> 
                
                <?php
                    if(empty($_POST)){
                        echo'
                        <form method = "POST" name="cadastro_genero">
                            <input type="text" name="nome_genero" required placeholder = "Nome g&ecirc;nero..."/>                        
                            <input type="submit" value="Cadastrar"/>
                        </form>
                        ';
                    }else{
                        include "conexao.php";

                        $nome = $_POST["nome_genero"];

                        $query = "INSERT into genero(nome) values('$nome')";

                        mysqli_query($conexao, $query) or die($query);

                        echo'<p style="color:black; font-family:Consolas;"> G&EcircNERO CADASTRADO! </p>';
                    }
                ?>                         
            </div>
            </center>
        </div>
    </body>
</html>