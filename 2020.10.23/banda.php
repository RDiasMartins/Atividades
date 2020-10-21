<?php
    include "conexao.php";

    $selectGenero = "SELECT nome, id_genero FROM genero";

    $resultadoGenero = mysqli_query($conexao,$selectGenero);

?>
<!DOCTYPE html>
<html lang="ptr-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Tabela banda - Filtro </title>
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
                <h4 style="color:black; font-family:Consolas;"> FILTRAR POR: </h3> 
        
                <form method = "POST" name="filtro">
                    <select name = "genero">
                        <option value =""> ::SELECIONE UM G&Ecirc;NERO::</option>
                        <?php
                            while($linhaGenero = mysqli_fetch_assoc($resultadoGenero)){
                                echo '<option value='.$linhaGenero["nome"].'> '.$linhaGenero["nome"].'</option>';
                            }
                        ?>
                    </select>
                    <br/><br/>
                    <input type="text" name="nome_banda" placeholder =  "Nome banda..."/>
                    <input type="submit" value="Pesquisar"/>
                </form>
                <br/> </hr>
                <?php
                    $select = "SELECT banda.nome as nome_banda, genero.nome as nome_genero FROM banda INNER JOIN genero ON banda.cod_genero = genero.id_genero";
                    
                    if(!empty($_POST)){
                        $select .= " WHERE (1=1) ";
                    
                        if($_POST["nome_banda"]!=""){
                            $nome = $_POST["nome_banda"];

                            $select .= " AND banda.nome like '%$nome%'";
                        }

                        if($_POST["genero"]!=""){
                            $genero = $_POST["genero"];

                            $select .= " AND genero.nome like '%$genero%'";
                        }
                    }

                    $resultado = mysqli_query($conexao,$select);

                    echo '<table class="table table-light table-striped table-hover" width="50%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Banda</th>
                                    <th>G&ecirc;nero</th>
                                </tr>
                            </thead>
                    ';

                    while($linha = mysqli_fetch_assoc($resultado)){
                        echo '<tr>
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

