<?php

    include "conexao.php";

    $id_tipo = $_POST["id_tipo"];
    $nome = $_POST["nome"];

    $update = "UPDATE tipo SET nome='$nome'
                                WHERE
                            id_tipo='$id_tipo'";
    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>