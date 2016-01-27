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
		<a href="pagecadastro.php">Cadastrar</a>

	</header>
	<form id="form1" name="form1" method="post" action="">
		<table border="0">
		<tr class="tr1">
			<td><input type="submit" name="ListarAll" id="ListarAll" value="Listar Todos" /></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>Buscar</td>
			<td>
				<input type="textfield" name="buscar" />
			</td>
			<td><input type="submit" name="Aceitar" id="Aceitar" value="Buscar Produtos" /></td>
		</tr>
	</form>

		<tr class="tr2">
			<td colspan="8">Lista de produtos</td>
		</tr>
		<tr class="tr3">
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

		<tr class="tr4">
			<td><?php printf("%s\n", $idproduto); ?></td>
			<td><img src="<?php printf("%s\n", $imagem); ?>" width="100" height="100"/></td>
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
					<input name="Comprar" type="submit" value="Comprar"/>
				</form>
			</td>
		</tr>
		<?php }

		$conexao->close(); ?>
	</table>
	
</body>
</html>