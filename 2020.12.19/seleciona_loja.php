<?php
    header('Content-Type: application/json');

    include "conexao.php";

    $select = "SELECT loja.nome as nome_loja, tipo.id_tipo as id_tipo, tipo.nome as nome_tipo 
               FROM loja INNER JOIN tipo ON loja.cod_tipo = tipo.id_tipo";

    if(isset($_GET["id_loja"])){
        $id_loja = $_GET["id_loja"];
        $select .= " WHERE id_loja='$id_loja'";
    }

    $resultado = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));

    while($linha = mysqli_fetch_assoc($resultado)){
        $matriz[]=$linha;
    }

    echo json_encode($matriz);
?>