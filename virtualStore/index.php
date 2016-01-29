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
	
		<table class="table " border="0">
		<tr >
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
        </tr>
	

		<tr>
			<td colspan="8"><p class="text-center">Lista de produtos</p></td>
		</tr>
		<tr >
			<td>CÓDIGO</td>
			<td>IMAGEM</td>
			<td>NOME</td>
			<td>DESCRIÇÃO</td>
			<td>PREÇO</td>
			<td>QUANTIDADE</td>
			<td>DATA</td>
			<td>ADICIONAR</td>
		</tr>

		<?php 
			$consulta = "SELECT * FROM produtos";

			if (isset($_POST['buscar'])) {
				$consulta = "SELECT * FROM produtos WHERE nome like '%".$_POST['buscar']."%'";

			}

			$result = $conexao->query($consulta);

			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$idproduto = $row['idproduto'];
				$imagem = $row['imagem'];
				$nome = $row['nome'];
				$descricao = $row['descricao'];
				$preco = $row['preco'];
				$quantidade = $row['quantidade'];
				$data = $row['data'];

				//$adicionar = '<a href="carrinho.php?idproduto=' . $row['idproduto'] . '"title="' . $row['nome'] . '"> Adicionar </a>';
			
		?>

		<tr>
			<td><?php printf("%s\n", $idproduto); ?></td>
			<td><img class="thumbnail" src="<?php printf("%s\n", $imagem); ?>" width="100" height="100"/></td>
			<td><?php printf("%s\n", $nome); ?></td>
			<td><?php printf("%s\n", $descricao); ?></td>
			<td>R$ <?php printf("%s\n", $preco); ?></td>
			<td><?php printf("%s\n", $quantidade); ?></td>
			<td><?php printf("%s\n", $data); ?></td>
			<td>
				<form action="carrinho.php" method="post" name="comprar">
					<input name="id_txt" type="hidden" value="<?php printf("%s\n", $idproduto); ?>"/>
					<input name="nome" type="hidden" value="<?php printf("%s\n", $nome); ?>"/>
					<input name="preco" type="hidden" value="<?php printf("%s\n", $preco); ?>"/>
					<input name="quantidade" type="hidden" value="1"/>
                    
                    <button name="Comprar" type="submit" class="btn btn-success">
                      Adicionar ao carrinho <span class="icon-glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 
                    </button>    
				</form>
			</td>
		</tr>
		<?php }

		 ?>
	</table>
	
</body>
</html>