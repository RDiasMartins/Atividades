<?php
    include "conexao.php";

    $selectGenero = "SELECT nome, id_genero FROM genero";

    $resultadoGenero = mysqli_query($conexao,$selectGenero);

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela m&uacutesica - Cadastro </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
        <script src="jquery-3.3.1.min.js"></script>
        <script>
                $(document).ready(function(){
                    $("select[name='genero']").change(function(){
                        genero = $("select[name='genero']").val();
                        
                        texto = "<select required name='s_banda' id='s_banda'><option value=''> ::SELECIONE UMA BANDA:: </option>";
                        $("select[name='s_banda']" ).prop( "disabled", false );
                        $.post("seleciona_banda.php",{'genero':genero},function(resultado){                   
                            $.each(resultado, function(indice, valor){
                                texto += '<option value = "'+valor.id_banda+'"> '+valor.nome+' </option>';

                                $("#banda").html(texto);
                            });                                             
                        });                    
                    });    
                });
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <?php
                include "menu.inc";
            ?>

            <center>
            <div class="form-generico col-sm-6">
                <h4 style="color:black; font-family:Consolas;"> CADASTRAR M&Uacute;SICA: </h3> 
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

                                <div id="banda">
                                    <select required name="s_banda" id="s_banda" disabled>
                                        <option value=""> ::SELECIONE UMA BANDA:: </option>       
                                    </select>
                                </div>

                                <br/>

                                <input type="text" required name="nome" placeholder =  "Nome m&uacute;sica..."/>
                                <br/><br/>
                                <textarea placeholder = "https://www.youtube.com/watch?v=" required name="youtube" rows="5" cols="33"></textarea>                   
                               
                                <br/><br/>
                                <input type="submit" value="Cadastrar"/>
                            </form>
                        ';
                    }else{
                        include "conexao.php";

                        $nome = $_POST["nome"];
                        $id_banda = $_POST["s_banda"];
                        $youtube = $_POST["youtube"];
                        
                        $query = "INSERT into musica(nome,cod_banda,youtube) values('$nome','$id_banda','$youtube')";

                        mysqli_query($conexao, $query) or die($query);

                        echo'<p style="color:black; font-family:Consolas;"> M&UacuteSICA CADASTRADA! </p>';
                    }        
                ?>
            </div>
            </center>
        </div>
    </body>
</html>