<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION["cpf"])){
		header("location: form_login.php");
	}
?>
<html lang = "pt-br">
    <head>
        <meta charset = "UTF-8"/>
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "css\bootstrap.min.css"/>
        <title>Visualizar Cookies</title>
		<script>
			var KeyCookies = null;

			function carregarTabela(){
				$.post("editarCookies.php", {'method': 'get', 'subject': 'cookie'}, function(retorno){
					KeyCookies = Object.keys(retorno);

					var HTML = null;
					for(var i = 0; i < KeyCookies.length; i++){
						HTML += '<tr>'
								+'<td scope = "col">'+ i +'</td>'
								+'<td scope = "col">'+ KeyCookies[i] +'</td>'
								+'<td scope = "col">'+ retorno[KeyCookies[i]] +'</td>'
								+'<td scope = "col">'
									+'<input type = "checkbox" name = "'+ i +'" id = "'+ i +'"/>'
									+'<label for = "'+ i +'">SIM</label>'
								+'</td>'
							+'</tr>';
					}
					$('#tbody').html(HTML);
				});
			}

			function zerarCookies(){
				var cookiesSelecionados = [];

				for(var i = 0; i < KeyCookies.length; i++){
					if($('#' + i.toString()).prop('checked')){
						cookiesSelecionados.push(KeyCookies[i]);
					}
				}

				$.post("editarCookies.php", {'method': 'delete', 'subject': cookiesSelecionados}, function(retorno){
					document.location.reload(true);
				});
			}

			function selecionarTudo(objeto){
				if(objeto.checked){
					for(var i = 0; i < KeyCookies.length; i++){
						$('#' + i.toString()).attr('checked', true);
					}
				}else{
					for(var i = 0; i < KeyCookies.length; i++){
						$('#' + i.toString()).attr('checked', false);
					}
				}
			}
		</script>
    </head>
    <body onload = "carregarTabela()">
		<header>
			<h2 class = "text-center"><a href = "index.php">Voltar para a Home</a></h2>
			<br/>
			<br/>
			<br/>
		</header>
        <main>
			<h1 class = "text-center" style = "padding-bottom: 20px;">Limpeza de Cookies</h1>

			<div class = "container">
				<table class = "table text-center table-stripped table-dark">
					<!--Cabeçalho da tabela-->
					<thead class = "thead-dark">
						<tr>
							<th scope = "col">#</th>
							<th scope = "col">Nome do Cookie</th>
							<th scope = "col">Valor</th>
							<th scope = "col">Apagar?</th>
						</tr>
					</thead>
					<tbody id = "tbody"></tbody>
					<tfoot>
						<tr>
							<th colspan = "3"> Deseja apagar todos os cookies? </th>
							<th>
								<input type = "checkbox" name = "selecionarTudo" id = "selecionarTudo" onchange = "selecionarTudo(this);">
								<label for = "selecionarTudo">SIM</label>
							</th>
						</tr>
					</tfoot>
				</table>
				<div class = "text-center">
					<button class = "btn btn-danger" onclick = 'zerarCookies()'>Limpar Cookies</button>
				</div>
			</div>
        </main>

        <script src = "js\jquery-3.5.1.min.js"></script>
        <script src = "js\popper.min.js"></script>
        <script src = "js\bootstrap.min.js"></script>
    </body>
</html>
