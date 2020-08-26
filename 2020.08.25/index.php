<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8"/>

        <title>Exercício AJAX</title>

        <script src="js\jquery-3.3.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#button").click(function(){
                    var palavra = $("input[name=nomes]").val();

                    if(palavra != ""){
                        $.get("php/observador.php", {"palavra": palavra}, function(mensagem){
                            if(mensagem == 'true'){
                                $("#span").css("color", "red");
                                $("#span").html("Fruta já cadastrada!");
                            }else{
                                $("#span").css("color", "green");
                                $("#span").html("Nova fruta cadastrada!");

                                var HTML = $("#lista").html();
                                HTML = HTML + mensagem;
                                $("#lista").html(HTML);
                            }
                        });
                    }
                });
            });
        </script>
    </head>

    <body>
        <form>
            <input type="text" name="nomes" placeholder="Digite o nome da fruta"/>

            <input type="button" id="button" value="Cadastro Assíncrono"/>
        </form>
        <hr/>
            <span id="span"></span>
        <hr/>

        <ul id="lista">
            <?php
                if( isset($_SESSION["frutas"]) ){
                    foreach($_SESSION["frutas"] as $fruta){
                        echo '<li>'.$fruta.'</li>';
                    }
                }
            ?>
        </ul>
    </body>
</html>
