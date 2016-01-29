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
	<?php
		session_start();

		if (isset($_POST['id_txt'])) {
			
			$idproduto = $_POST['id_txt'];
			$nome = $_POST['nome'];
			$preco = $_POST['preco'];
			$quantidade = $_POST['quantidade'];

			$meucarrinho[] = array('idproduto' => $idproduto, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);


			/*echo 'O ID do produto é: ' . $_POST['id_txt']; 
			$nroreg = $_POST['id_txt'];
			$consulta = "SELECT * FROM produtos WHERE idproduto = '$nroreg'";
			$result = $conexao->query($consulta);
			
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

				printf("<br /><h3>Produtos: </h3>");
				printf("ID: ". $row['idproduto']);
				printf("<br/>Nome do produto: ". $row['nome']);

			}*/
		}

		$SESSAO['carrinho'] = $meucarrinho;
	
	?>

	<table border="1">
		<tr class="tr2">
			<td colspan="4">Produtos</td>
		</tr>
		<tr class="tr3">
			<td>NOME</td>
			<td>PREÇO</td>
			<td>QUANTIDADE</td>
			<td>SUB TOTAL</td>
		</tr>
		<?php 
		if (isset($meucarrinho)) {
			$total = 0;
			for ($i=0; $i < count($meucarrinho) ; $i++) { 
		?>
		<tr class="tr4">
			<td><?php printf($meucarrinho[$i] ['nome']); ?></td>
			<td>R$ <?php printf($meucarrinho[$i] ['preco']); ?></td>
			<td><?php printf($meucarrinho[$i] ['quantidade']); ?></td>
			<?php
				$subtotal = $meucarrinho[$i]['preco'] * $meucarrinho[$i] ['quantidade'];
				$total = $total + $subtotal;
			 ?>
			<td style="background: #008800; color: #FFFFFF; font-weight: bold;">R$ <?php printf($subtotal); ?></td>
		</tr>
		<?php 
			}
		}
		?>
		<tr class="tr2">
			<td colspan="3">Total</td>
			<td>R$ <?php printf($total); ?></td>
		</tr>
	</table>

	<!--
				ASSISTIR A ESTA
					VIDEO AULA
				https://www.youtube.com/watch?v=qZbhYx4lNZk&list=PLxNM4ef1BpxikUFzfzEk-yRS5g7hmVZWx&index=26
					DO COMEÇO
				VLW!

	 -->
</body>
</html>