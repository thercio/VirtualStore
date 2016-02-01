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

		if (isset($_POST['id_txt'])) {
			
			$idproduto = $_POST['id_txt'];
			$nome = $_POST['nome'];
			$preco = $_POST['preco'];
			$quantidade = $_POST['quantidade'];

			$meucarrinho[] = array('idproduto' => $idproduto, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);

		} 

		session_start();

		if (isset($_SESSION['carrinho'])) {
			$meucarrinho = $_SESSION['carrinho'];
			if (isset($_POST['id_txt'])) {
				$idproduto = $_POST['id_txt'];
				$nome = $_POST['nome'];
				$preco = $_POST['preco'];
				$quantidade = $_POST['quantidade'];
				$pos = -1;
				for ($i=0; $i < count($meucarrinho) ; $i++) { 
					if ($idproduto == $meucarrinho[$i]['idproduto']) {
						$pos = $i;
					}
				}

				if ($pos <> -1) {
					$quant = $meucarrinho[$pos] ['quantidade'] + $quantidade;
					$meucarrinho[$pos] = array('idproduto' => $idproduto, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quant);
				} else {
					$meucarrinho[] = array('idproduto' => $idproduto, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);
				}

				//$meucarrinho[] = array('idproduto' => $idproduto, 'nome' => $nome, 'preco' => $preco, 'quantidade' => $quantidade);
			}
		}

		if (isset($_POST['id2'])) {
			$indice = $_POST['id2'];
			$quant = $_POST['quantidade2'];
			$meucarrinho [$indice] ['quantidade'] = $quant;
		}

		if (isset($_POST['id3'])) {
			$indice = $_POST['id3'];
			$meucarrinho [$indice] = null;
		}

		if (isset ($meucarrinho)) $_SESSION['carrinho'] = $meucarrinho;
	
	?>

	<table class="table">
		<tr>
			<td colspan="4"><p class="text-center">Produtos</p></td>
		</tr>
		<tr>
			<td>NOME</td>
			<td>PREÇO</td>
			<td>QUANTIDADE</td>
			<td>SUB TOTAL</td>
		</tr>
		<?php 
		if (isset($meucarrinho)) {
			$total = 0;
			for ($i=0; $i < count($meucarrinho) ; $i++) { 

				if ($meucarrinho[$i]<>null) {
					
		?>
		<tr class="tr4">
			<td><?php printf($meucarrinho[$i] ['nome']); ?></td>
			<td>R$ <?php printf($meucarrinho[$i] ['preco']); ?></td>
			<td>
				<form action="" method="post" name="atualizar">
					<input name="id2" type="hidden" value="<?php printf($i); ?>" />
					<input name="quantidade2" type="text" value="<?php printf($meucarrinho[$i] ['quantidade']); ?>" />
					<input name="" type="image" src="imagens/atua.png" width="20" height="20"/>
					<!--Quiser colocar um botão aqui, coloca name="id2" -->
				</form>
			</td>
			<?php
				$subtotal = $meucarrinho[$i]['preco'] * $meucarrinho[$i] ['quantidade'];
				$total = $total + $subtotal;
			 ?>
			<td style="background: #008800; color: #FFFFFF; font-weight: bold;">R$ <?php printf($subtotal); ?></td>
			<td style="background: #FFF; border-top: 0;">
				<form action="" method="post">
					<input name="id3" type="hidden" value="<?php printf($i); ?>" />
					<input name="" type="image" src="imagens/delete.png" width="50" height="50">
					<!--Quiser colocar um botão aqui, coloca name="id3" -->
				</form>
			</td>
		</tr>
		<?php 
			}
			}
		}
		?>
		<tr class="tr2">
			<td colspan="3">Total</td>
			<td>R$ <?php if(isset($total)) printf($total); ?></td>
		</tr>
	</table>
	<form action="" method="post">
		<?php 
			if (isset($_POST['removeAll'])) {
				session_destroy();
			}
		?>
		<br />
		<input name="removeAll" type="submit" class="btn btn-danger btn-xs" value="Remover todos" />
	</form>
	<!--
				ASSISTIR A ESTA
					VIDEO AULA
											https://www.youtube.com/watch?v=31PbBeswni0&list=PLxNM4ef1BpxikUFzfzEk-yRS5g7hmVZWx&index=35
					DO COMEÇO
				VLW!

	 -->
</body>
</html>