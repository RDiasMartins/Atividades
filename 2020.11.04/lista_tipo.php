<?php
    include "conf.php";
    include "conexao.php";
    cabecalho();

    echo '<br/> 
        <table class="table table-dark table-striped table-hover" width="100%"
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                </tr>
            </thead>
        ';

    $select = "SELECT nome FROM tipo ORDER BY nome";
    $resultado = mysqli_query($conexao, $select) or die(mysqli_error($conexao));
    while($linha = mysqli_fetch_assoc($resultado)){
        $nome = $linha["nome"];
        echo "<td>$nome</td>";
    }
    echo "</table>";

    rodape();
?>