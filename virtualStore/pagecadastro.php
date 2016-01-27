<?php include("conecta.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Loja Virtual - Início</title>
	<meta charset="UTF-8"/>
</head>

<body>
	<header>
		<h1>Loja Virtual</h1>
		<h3>thercio01395@hotmail.com</h3>
		<a href="index.php">Home</a>
		<!--

		
			ESTOU NESTE VÍDEO
				AINDA NÃO O ASSISTI
			https://www.youtube.com/watch?v=6zIQoVpQqzc&index=15&list=PLxNM4ef1BpxikUFzfzEk-yRS5g7hmVZWx
				VIDEO 15
			ASSISTI-LI PARA CONTINUAR


		 -->

	</header>
	<form id="cadas" enctype="multipart/form-data" name="cadas" method="post" action="cadastro.php">
		<table border="0">
		<tr class="tr2">
			<td colspan="8">Lista de produtos</td>
		</tr>
		<tr class="tr3">
			<td>NOME</td>
			<td>DESCRIÇÃO</td>
			<td>PREÇO</td>
			<td>QUANTIDADE</td>
			<td>DATA</td>
			<td>IMAGEM</td>
		</tr>

		<tr class="tr4">
			<td><input type="text" id="nome" name="nome" placeholder="Nome do produto"/></td>
			<td><input type="textarea" id="descricao" name="descricao" placeholder="Descrição do produto"/></td>
			<td><input type="text" id="preco" name="preco" placeholder="Preço do produto"/></td>
			<td><input type="text" id="quantidade" name="quantidade" placeholder="Quantidade do produto"/></td>
			<td><input type="text" id="data" name="data" placeholder="Data do produto"/></td>
			<td><input type="file" id="imagem" name="imagem"/></td>
			<td><input type="submit" id="enviar" name="enviar" value="Enviar"/></td>
		</tr>

	</table>
</form>
</body>
</html>