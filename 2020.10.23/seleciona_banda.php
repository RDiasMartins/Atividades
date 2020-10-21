<?php
   header('Content-Type: application/json');

    include "conexao.php";
    
    $genero = $_POST['genero'];

    $selectBanda = "SELECT nome, id_banda FROM banda WHERE cod_genero = '$genero'";

    $resultadoBanda = mysqli_query($conexao,$selectBanda);

    while($linhaBanda = mysqli_fetch_assoc($resultadoBanda)){
        $resultado[] = $linhaBanda;
    } 

    echo json_encode($resultado);
?>