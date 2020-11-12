<script src="js/jquery-3.5.1.min.js"></script>

<?php
    include "conf.php";
    include "conexao.php";
    include "script_remover_tipo.php";
    cabecalho();

    echo '<br/>
        <div id="msg"></div>
        <table class="table table-dark table-striped table-hover" width="100%"
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>          
        ';

    $select = "SELECT * FROM tipo ORDER BY nome";
    
    $resultado = mysqli_query($conexao, $select) or die(mysqli_error($conexao));

    while($linha = mysqli_fetch_assoc($resultado)){
        $nome = $linha["nome"];
        $tipo = $linha["id_tipo"];
        echo "
            <tr>
                <td>$nome</td>
                <td>
                    <button class = 'btn-sm btn-danger remover' value='$tipo'>Remover</button>
                </td>
            </tr>
        ";
    }
    echo "</table>";
    
    rodape();
?>