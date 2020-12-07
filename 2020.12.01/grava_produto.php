<?php
    include "conexao.php";

    $nome = $_POST["nome"];
    $cod_loja = $_POST["cod_loja"];
    $descricao = $_POST["descricao"];

    $query = "INSERT INTO produto(nome, cod_loja,descricao) VALUES ('$nome','$cod_loja','$descricao')";
    
    mysqli_query($conexao, $query) or die(mysqli_error($conexao));    

    header('Location: index.php');
?>
