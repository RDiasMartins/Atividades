<?php
	include "conteudo.php";
	
	if(isset($_COOKIE["CPF"])){
		if ($_COOKIE["Permissao"] == 1 ){
			$nivel = "Aluno";
		}else if ($_COOKIE["Permissao"] == 2){
			$nivel = "Professor";
		}else{
			$nivel = "Administrador";
		}

		$titulo = "Entrada";
		$conteudos = array();
		$conteudos[0] = "<p>Olá, ".$_COOKIE['Email'].".</p>";
		$conteudos[1] = "<p>Seu tipo é ".$_COOKIE['Permissao'].".</p>";
		$conteudos[2] = "<p>Nível de permissão identificado como de ".$nivel."</p>";
		$conteudos[3] = "<p>Seja bem vindo ao sistema</p>";
		$conteudos[4] = "<p><a href='logout.php'>Sair</a></p>";
		exibir($titulo, $conteudos);
	}
	else {
		setcookie('CPF');
		setcookie('Permissao');
		setcookie('Email');

		header("location: form_login.html");
	}
?>