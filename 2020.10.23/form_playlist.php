<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Playlist - Cadastro </title>
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
                <h4 style="color:black; font-family:Consolas;"> CADASTRAR PLAYLIST: </h3> 
                
                <?php
                    include "conexao.php";
                    if(empty($_POST)){
                        echo'
                        <form method = "POST" name="cadastro_playlist">
                            <input type="text" name="nome_playlist" required placeholder = "Nome playlist..."/> <br/> <br/>  
                        ';
                        $query = "SELECT musica.id_musica AS codigo_musica, musica.nome AS nome_musica, banda.nome AS nome_banda, genero.nome AS nome_genero FROM musica 
                            INNER JOIN banda ON musica.cod_banda = banda.id_banda INNER JOIN genero ON banda.cod_genero = genero.id_genero";
                        
                        $resultado = mysqli_query($conexao, $query) or die ($query);
                        while($linhaMusica = mysqli_fetch_assoc($resultado)){
                            echo '<input type = "checkbox" name = "' .$linhaMusica["codigo_musica"]. '">'. $linhaMusica["nome_musica"] .' - '. $linhaMusica["nome_banda"] .' | '. $linhaMusica["nome_genero"].'<br/>';
                        }

                        echo'
                            <br/>
                            <input type="submit" value="Cadastrar"/>
                        </form>
                        ';
                    }else{
                        $nome = $_POST["nome_playlist"];

                        $query = "INSERT INTO playlist(nome) values('$nome')";

                        mysqli_query($conexao, $query);

                        $query = "SELECT playlist.id_playlist AS codigo_playlist FROM playlist WHERE playlist.nome = '".$nome."'";
                        
                        $codigo_playlist = mysqli_query($conexao, $query);

                        $codigo_playlist = mysqli_fetch_row($codigo_playlist);

                        $query = "SELECT musica.id_musica AS cod_musica FROM musica";

                        $resultados = mysqli_query($conexao, $query);

                        $query2 = "INSERT INTO musica_playlist(cod_musica, cod_playlist) VALUES";
                        $codigo = array();
                       
                        while($linha=mysqli_fetch_assoc($resultados)){
                            $cod_musica=$linha["cod_musica"];

                            if(isset($_POST[$cod_musica])){
                                $codigo[] = $cod_musica;
                            }
                        }

                        for($i=0;$i<sizeof($codigo)-1;$i++){
                            $query2 .= "($codigo[$i], ".$codigo_playlist[0]."),";
                        }
                        $query2 .= "($codigo[$i], ". $codigo_playlist[0].")";

                        mysqli_query($conexao, $query2);

                        echo'<p style="color:black; font-family:Consolas;"> PLAYLIST CADASTRADA! </p>';
                    }
                ?>                         
            </div>
            </center>
        </div>
    </body>
</html>