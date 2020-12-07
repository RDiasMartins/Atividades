<?php

    include "conexao.php";

    $id_produto = $_POST["id_produto"];
    $nome = $_POST["nome"];                      
    $descricao = $_POST["descricao"];  

    $update = "UPDATE produto SET nome='$nome', descricao='$descricao' WHERE id_produto='$id_produto'";
    
    mysqli_query($conexao,$update)
        or die(mysqli_error($conexao));

    echo "1";

?>