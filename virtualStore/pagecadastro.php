<?php include("conecta.php"); ?>
<!DOCTYPE html>
<html>
<head>
    
	<title>Virtual Store </title>
	<meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" >
    <script src="js/jquery-2.2.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
	
        <?php include("header.html"); ?>
    
	<form id="cadas" enctype="multipart/form-data" name="cadas" method="post" action="cadastro.php">
		<table class="table" border="0">
		<tr >
			<td  colspan="8"><p class="text-center">Lista de produtos</p></td>
		</tr>
		<tr >
			<td>NOME</td>
			
			<td>PREÇO</td>
			<td>QUANTIDADE</td>
			<td>DATA</td>
            <td>DESCRIÇÃO</td>
			<td>IMAGEM</td>
		</tr>

		<tr>
			<td><input class="form-control" id="focusedInput" type="text" id="nome" name="nome" placeholder="Nome do produto"/></td>
			<td><input class="form-control" id="focusedInput" type="text" id="preco" name="preco" placeholder="Preço do produto"/></td>
			<td><input class="form-control" id="focusedInput" type="text" id="quantidade" name="quantidade" placeholder="Quantidade do produto"/></td>
			<td><input class="form-control" id="focusedInput" type="text" id="data" name="data" placeholder="Data do produto"/></td>
            <td><input class="form-control" id="focusedInput" type="textarea" id="descricao" name="descricao" placeholder="Descrição do produto"/></td>
            <td>     
                <div class="input-group input-group-lg">
                    
                    <input type="file"  id="imagem" name="imagem" class="form-control"  aria-describedby="sizing-addon1">
                </div>
            </td>
			
		</tr>
        
	</table>
    <input class="btn btn-success" type="submit" id="enviar" name="enviar" value="Cadastrar Produto"/>
</form>
</body>
</html>