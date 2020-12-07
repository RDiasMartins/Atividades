<?php
    include "conf.php";
    include "conexao.php";

    cabecalho();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#gravar").click(function() {
                nome = $("#nome_loja").val();
                cod_tipo = $("#selectTipo").val();

                $.post("grava_loja.php", {"nome":nome,"cod_tipo":cod_tipo}, function(msg){});});
        });
    </script>
</head>
<body>
    <div class="container">
        <form class="grava_dados">
            <h4> Inserção de loja </h4>
            <select id="selectTipo">
                <option value=''>::Tipo da loja::</option>
                <?php
                    $select = "SELECT * FROM tipo ORDER BY nome";
                    $resultado = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
                    while($linha = mysqli_fetch_assoc($resultado)){
                        $nome = $linha["nome"];
                        $cod_tipo = $linha["id_tipo"];
                        echo "<option id='tipo' value='$cod_tipo'>$nome</option>";
                    }
                ?>

            </select> 
           
            <br/> <br/> <input type="text" id="nome_loja" name="nome_loja" placeholder="Nome da loja..."> <br/> <br/>     
            
            <button class='btn btn-success' id='gravar'>Cadastrar</button>
        </form>
    </div>
</body>
</html>

<?php
    rodape();
?>
