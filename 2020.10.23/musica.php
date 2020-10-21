<?php
    include "conexao.php";

    $selectGenero = "SELECT nome, id_genero FROM genero";

    $resultadoGenero = mysqli_query($conexao,$selectGenero);

?>
<!DOCTYPE html>
<html lang="ptr-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela m&uacutesica - Filtro </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="estilo.min.css" />
        <script src="jquery-3.3.1.min.js"></script>
        <script>
                $(document).ready(function(){
                    $("select[name='genero']").change(function(){
                        genero = $("select[name='genero']").val();
                        
                        texto = "<select name='s_banda' id='s_banda'><option value=''> ::SELECIONE UMA BANDA:: </option>";
                        $("select[name='s_banda']" ).prop( "disabled", false );
                        $.post("seleciona_banda.php",{'genero':genero},function(resultado){                   
                            $.each(resultado, function(indice, valor){
                                texto += '<option value = "'+valor.id_banda+'"> '+valor.nome+' </option>';
                                console.log(texto);

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
                <h4 style="color:black; font-family:Consolas;"> FILTRAR POR: </h3> 
        
                    <form method = "POST" name="filtro">
                        <select name = "genero">
                            <option value =""> ::SELECIONE UM G&Ecirc;NERO::</option>
                            <?php
                                while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                                    echo '<option value='.$linhaGenero["id_genero"].'> '.$linhaGenero["nome"].'</option>';
                                }
                            ?>
                        </select>

                        <br/> <br/>

                        <div id="banda">
                            <select name="s_banda" id="s_banda" disabled>
                                <option value=""> ::SELECIONE UMA BANDA:: </option>       
                            </select>
                        </div>
                        <br/>

                        <input type="text" name="nome_musica" placeholder =  "Nome m&uacute;sica..."/>
                        <input type="submit" value="Pesquisar"/>
                    </form>
                    <br/> </hr>
                    <?php
                        include "conexao.php";

                        $select = "SELECT musica.nome as nome_musica, banda.nome as nome_banda, genero.nome as nome_genero, 
                                    genero.id_genero as id_genero, banda.id_banda as id_banda FROM musica
                                    INNER JOIN banda ON musica.cod_banda=banda.id_banda 
                                    INNER JOIN genero ON banda.cod_genero=genero.id_genero";
                                    
                        

                        if(!empty($_POST)){     
                            if($_POST["genero"]!=""){   
                                if(isset($_POST["s_banda"]) && $_POST["s_banda"]!=""){
                                    $s_banda = $_POST["s_banda"];
                    
                                    $select .= " AND banda.id_banda = '$s_banda'";
                                }else{
                                    $genero = $_POST["genero"];
                    
                                    $select .= " AND genero.id_genero = '$genero'";       

                                }         
                            }
                            if($_POST["nome_musica"]!=""){
                                $nome_musica = $_POST["nome_musica"];
                                
                                $select .= " WHERE musica.nome like '%$nome_musica%'";
                            } 
                        }

                        
                        $resultado = mysqli_query($conexao,$select); 

                        echo '<table class="table table-light table-striped table-hover" width="50%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>M&uacute;sica</th>
                                        <th>Banda</th>
                                        <th>G&ecirc;nero</th>
                                    </tr>
                                </thead>
                        ';

                        while($linha = mysqli_fetch_assoc($resultado)){
                            echo '<tr>
                                    <td>'.$linha["nome_musica"].'</td>
                                    <td>'.$linha["nome_banda"].'</td>
                                    <td>'.$linha["nome_genero"].'</td>
                                </tr>'; 
                        }

                        echo "</table>";
                    ?>
            </div>
            </center>
        </div>
    </body>
</html>
