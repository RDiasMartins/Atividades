<?php	
    if(!empty($_POST)) {
		
		include "conexao.php";
		
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT cpf, id_perfil FROM usuario WHERE email=? AND senha=?";
        
        if($stmt = mysqli_prepare($conexao, $sql)) { //retorna um statement ou false

            mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
            //retorna true ou false

            mysqli_stmt_execute($stmt);
            //retorna true ou false

            $resultado = mysqli_stmt_get_result($stmt);
            //retorna um resultset para comandos SELECT ou false
            
            if(mysqli_num_rows($resultado) == 1) {
                
                $linha = mysqli_fetch_assoc($resultado);
                

                $cpf = $linha["cpf"];
                $permissao = $linha["id_perfil"];
                $emailUser = $email;

                setcookie("Email", $email, time() + 60);
                setcookie("CPF", $cpf, time() + 60);
                setcookie("Permissao", $permissao, time() + 60);
               


                header("location: index.php");
            }
            else {
                
                header("location: erro.html");
            }
            mysqli_stmt_close($stmt);
            //fecha o statement
        }
        else {
            echo "Houve um erro na preparação da consulta SQL:".mysqli_error($conexao);
        }
        mysqli_close($conexao);
        //fecha a conexão
    }
    else {
        header("location: form_login.html");
    }

?>