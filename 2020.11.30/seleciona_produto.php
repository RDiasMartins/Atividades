<?php
    header('Content-Type: application/json');

    include "conexao.php";

    $select = "SELECT produto.nome as nome_produto, produto.descricao as descricao_produto, loja.id_loja as id_loja, loja.nome as nome_loja 
               FROM produto INNER JOIN loja ON produto.cod_loja = loja.id_loja";

    if(isset($_GET["id_produto"])){
        $id_produto = $_GET["id_produto"];
        $select .= " WHERE id_produto='$id_produto'";
    }

    $resultado = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));

    while($linha = mysqli_fetch_assoc($resultado)){
        $matriz[]=$linha;
    }

    echo json_encode($matriz);
?>