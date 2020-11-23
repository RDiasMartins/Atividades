<?php
    header('Content-Type: application/json');

    include "conexao.php";

    $select = "SELECT * FROM tipo";

    if(isset($_GET["id_tipo"])){
        $id_tipo = $_GET["id_tipo"];
        $select .= " WHERE id_tipo='$id_tipo'";
    }

    $resultado = mysqli_query($conexao,$select)
        or die(mysqli_error($conexao));

    while($linha = mysqli_fetch_assoc($resultado)){
        $matriz[]=$linha;
    }

    echo json_encode($matriz);