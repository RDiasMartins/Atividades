<?php
    include "conf.php";
    include "conexao.php";
    cabecalho();

    echo '<br/> 
        <table class="table table-dark table-striped table-hover" width="100%"
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                </tr>
            </thead>
        ';

    $select = "SELECT nome,descricao FROM produto ORDER BY nome";
    $resultado = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
    while($linha = mysqli_fetch_assoc($resultado)){
        $nome = $linha["nome"];
        $descricao = $linha["descricao"];
        echo "
            <td>$nome</td>
            <td>$descricao</td>
        ";
    }
    echo "</table>";

    rodape();
?>