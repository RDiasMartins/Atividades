<script src="js/jquery-3.5.1.min.js"></script>

<?php
    include "conf.php";
    include "conexao.php";

    cabecalho();

    echo '<br/> 
        <div id="msg"></div>
        <table class="table table-dark table-striped table-hover" width="100%"
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
        ';

    $select = "SELECT * FROM produto ORDER BY nome";
   
    $resultado = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
    
    while($linha = mysqli_fetch_assoc($resultado)){
        $nome = $linha["nome"];
        $descricao = $linha["descricao"];
        $produto = $linha["id_produto"];

        echo "
            <tr>
                <td>$nome</td>
                <td>$descricao</td>
                <td> 
                    <button class='alterar_produto' value='$produto' data-toggle='modal' data-target='#modal'>✏️</button> 
                    <button class = 'remover_produto' value='$produto'>ˣ</button>      
                </td>
            </tr>
        ";
    }
    echo "</table>";

    $titulo = "Alterar produto";
    $formulario = "alterar_produto.php";
    include "modal.php";
        
    include "scripts_produto.php"; 

    rodape();
?>