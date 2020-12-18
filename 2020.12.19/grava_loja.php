<?php
    include "conexao.php";

    $nome = $_POST["nome"];
    $cod_tipo = $_POST["cod_tipo"];

    $query = "INSERT INTO loja(nome, cod_tipo) VALUES ('$nome','$cod_tipo')";
    
    mysqli_query($conexao, $query) or die(mysqli_error($conexao));    

    header('Location: index.php');
?>
