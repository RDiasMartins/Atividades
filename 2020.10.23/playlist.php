<!DOCTYPE html>
<html lang="ptr-BR">
    <head>
        <meta charset="ISO-8859">
        <title> Playlist - Filtro </title>
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
                        <select name = "cod_playlist">
                            <option value = "">::SELECIONE UMA PLAYLIST::</option>
                            <?php
                                include "conexao.php";

                                $query = "SELECT playlist.id_playlist AS cod_playlist, playlist.nome AS nome_playlist FROM playlist";
                                $resultadoPlaylist = mysqli_query($conexao, $query);

                                while($linhaPlaylist = mysqli_fetch_assoc($resultadoPlaylist)){
                                    echo "<option value = '". $linhaPlaylist["cod_playlist"] ."'>". $linhaPlaylist["nome_playlist"] ."</option>";
                                }
                            ?>
                        </select>

                        <input type="submit" value="Pesquisar"/>
                    </form>
                    <br/> </hr>
                    <?php
                        include "conexao.php";

                        $query = "SELECT playlist.nome AS nome_playlist, playlist.id_playlist AS cod_playlist FROM playlist";
                         
                        if(!empty($_POST)){
                            $query .= " where (1=1)";
                            
                            if($_POST["cod_playlist"] != ""){
                                $query .= " AND playlist.id_playlist = ".$_POST["cod_playlist"];
                            }
                        }
                        
                        $resultadoPlaylist = mysqli_query($conexao, $query);
             
                        while($linhaPlaylist = mysqli_fetch_assoc($resultadoPlaylist)){
                            $nome_playlist = $linhaPlaylist["nome_playlist"];

                            echo "<h3  style='color:black; font-family:Consolas;'>". $nome_playlist ."</h3> <br/>";
                            
                            $query2 = "SELECT musica_playlist.cod_musica AS codigo_musica FROM musica_playlist where musica_playlist.cod_playlist = ". $linhaPlaylist["cod_playlist"];

                            $resultadoMusica = mysqli_query($conexao, $query2);
                
                            while($linhaMusica = mysqli_fetch_assoc($resultadoMusica)){
                                $codigo_musica = $linhaMusica["codigo_musica"];
            
                                $query3 = "SELECT musica.nome AS nome_musica, musica.youtube AS codigo_musica, genero.nome AS nomeGenero, banda.nome AS nomebanda FROM musica 
                                    INNER JOIN banda banda ON musica.cod_banda = banda.id_banda INNER JOIN genero ON genero.id_genero = banda.cod_genero WHERE musica.id_musica = ". $codigo_musica;
                               
                                $resultadoMusica2 = mysqli_query($conexao, $query3);
                                $resultadoMusica2 = mysqli_fetch_row($resultadoMusica2);
            
                                echo  $resultadoMusica2["0"] . " - " . $resultadoMusica2["3"] . " - " . $resultadoMusica2["2"]. "<br/><br/>";
                                echo '<iframe width="720" height="500" src="https://www.youtube.com/embed/'. $resultadoMusica2[1] .'" frameborder="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen> </iframe> <br/>';
                            }
                        }
                    ?>
            </div>
            </center>
        </div>
    </body>
</html>
