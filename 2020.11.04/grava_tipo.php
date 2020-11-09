<?php
    include "conexao.php";

    $nome = $_POST["nome_tipo"];

    $query = "INSERT INTO tipo(nome) VALUES ('$nome')";

    mysqli_query($conexao, $query) or die(mysqli_error($conexao));    

    header('Location: index.php');
?>
