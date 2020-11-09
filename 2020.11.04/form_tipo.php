<?php
    include "conf.php";

    cabecalho();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.5.1.min.js"></script>
    <link href='css/index.css' rel='stylesheet' type='text/css'>
    <script>
        $(document).ready(function() {
            $("#gravar").click(function() {
                nome_tipo = $("#nome_tipo").val();
                $.post("grava_tipo.php", {"nome_tipo":nome_tipo}, function(msg){});
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <form class="grava_dados">
            <h4> Inserção de tipo de loja </h4>
            <input style = "text-align:center;" type="text" id="nome_tipo" name="nome_tipo" placeholder="Nome do tipo..."><br><br>

            <button class='btn btn-success' id='gravar' >Cadastrar</button>
        </form>
    </div>
</body>
</html>

<?php

    rodape();

?>
