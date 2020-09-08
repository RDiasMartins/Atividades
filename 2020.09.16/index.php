<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title> Consulta CEP - JSON </title>
	 	<script src="jquery-3.3.1.min.js"></script>
		<meta charset="UTF-8"/>
		<script>
			$(document).ready(function(){
				$("input[name='cep']").blur(function(){
					$.getJSON("http://viacep.com.br/ws/"+$("input[name='cep']").val()+"/json", function(valores){
					 						
					 	$("#logradouro").val(valores.logradouro);
					 	$("#bairro").val(valores.bairro);
					 	$("#localidade").val(valores.localidade);
					 	$("#uf").val(valores.uf);
					});


				})
			});
		</script>
		<style>
			.consulta{
				width: 500px;
				height: 200px;
				border: 1px solid black;
				border-radius: 5px;
			}
			input{
				text-align:center;
				margin-top:10px;
				
			}
		</style>
	</head>
	<body>
		<center>
			<form class = "consulta">
				<input type = "text" name = "cep" id = "cep" placeholder = "CEP"/> 

				<hr> <br/>

				<input type = "text" name = "logradouro" id = "logradouro" placeholder = "Endereço"/>
				<input type = "text" name = "bairro" id = "bairro" placeholder = "Bairro"/>
				<input type = "text" name = "localidade" id = "localidade" placeholder = "Cidade"/>
				<input type = "text" name = "uf" id = "uf" placeholder = "Estado"/>
			</form>
		</center>
	</body>
</html>