<script src="js/jquery-3.5.1.min.js"></script>

<?php
    include "conf.php";
    include "conexao.php";
    include "script_remover_loja.php";
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

    $select = "SELECT * FROM loja ORDER BY nome";
    $resultado = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
    while($linha = mysqli_fetch_assoc($resultado)){
        $nome = $linha["nome"];
        $loja = $linha["id_loja"];
        echo "
            <tr>
                <td>$nome</td>
                <td>
                    <button class = 'btn-sm btn-danger remover' value='$loja'>Remover</button>
                </td>
            </tr>
        ";
    }
    echo "</table>";

    rodape();
?>