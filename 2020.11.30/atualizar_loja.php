<?php

    include "conexao.php";

    $id_loja = $_POST["id_loja"];
    $nome = $_POST["nome"];                      
                
    $update = "UPDATE loja SET nome='$nome' WHERE id_loja='$id_loja'";
    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>