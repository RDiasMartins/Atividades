<?php
    include "conexao.php";

    $email = $_POST["email"];
    $senha = $_POST["senha_cadastro"];
    $permissao = $_POST["permissao"];

    $select = "SELECT * FROM usuario WHERE email like '%$email%'";

    $resultado = mysqli_query($conexao, $select);

    if(mysqli_num_rows($resultado) == 1){
        header("location:index.php?erro=2");
    }else{
        $query = "INSERT INTO usuario(email,senha,permissao ) VALUES ('$email', '$senha', '$permissao')";
        
        mysqli_query($conexao,$query);
        header("location:index.php?cadastro=1");
    }
?>