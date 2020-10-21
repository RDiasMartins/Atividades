<?php
    include "conexao.php";

    $selectGenero = "SELECT nome, id_genero FROM genero";

    $resultadoGenero = mysqli_query($conexao,$selectGenero);

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela banda - Cadastro </title>
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
                <h4 style="color:black; font-family:Consolas;"> CADASTRAR BANDA: </h3> 
                
                <?php
                    if(empty($_POST)){
                        echo'
                            <form method = "POST" name="cadastro_genero">
                                <select required name = "genero">
                                    <option value =""> ::SELECIONE UM G&Ecirc;NERO::</option>
                            ';
                            while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                                echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome"].'</option>';
                            }
                        echo'
                                </select>
                                <br/><br/>
                                <input type="text" name="nome_banda" required placeholder =  "Nome banda..."/>
                                <input type="submit" value="Cadastrar"/>
                            </form>
                        ';
                    }else{
                        include "conexao.php";

                        $nome = $_POST["nome_banda"];
                        $cod_genero = $_POST["genero"];

                        $query = "INSERT into banda(nome, cod_genero) values('$nome','$cod_genero')";

                        mysqli_query($conexao, $query) or die($query);

                        echo'<p style="color:black; font-family:Consolas;"> BANDA CADASTRADA! </p>';
                    }        
                ?>
            </div>
            </center>
        </div>
    </body>
</html>