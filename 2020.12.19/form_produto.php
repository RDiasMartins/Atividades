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
                nome = $("#nome_produto").val();
                cod_loja = $("#selectLoja").val();
                descricao = $("#descricao").val();

                $.post("grava_produto.php", {"nome":nome,"cod_loja":cod_loja,"descricao":descricao}, function(msg){
                });
            
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <form class="grava_dados">
            <h4> Inserção de produto </h4>
            <select id="selectLoja">
                <option value=''>::Loja::</option>
                <?php
                    $select = "SELECT * FROM loja ORDER BY nome";
                    $resultado = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
                    while($linha = mysqli_fetch_assoc($resultado)){
                        $nome = $linha["nome"];
                        $cod_loja = $linha["id_loja"];
                        echo "<option id='loja' value='$cod_loja'>$nome</option>";
                    }
                ?>

            </select> 
           
            <br/> <br/> <input type="text" id="nome_produto" name="nome_produto" placeholder="Nome da produto...">     
            <br/> <br/> <input type="text" id="descricao" name="descricao" placeholder="Descrição da produto...">

            <br/> <br/> <button class='btn btn-success' id='gravar'>Cadastrar</button>
        </form>
    </div>
</body>
</html>

<?php
    rodape();
?>
