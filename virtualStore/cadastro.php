<?php 

	$conexao = mysqli_connect('localhost', 'root','', 'loja') 
		or die ('Não foi possível se conectar ao servidor ou ao banco de dados');

		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$preco = $_POST['preco'];
		$quantidade = $_POST['quantidade'];
		
		$data = $_POST['data'];

		$uploaddir = 'imagens/';
		$imagem = $uploaddir . basename($_FILES['imagem']['name']);

		if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem)) {
		    echo "Arquivo valido e enviado com sucesso.<br>";
		} else {
		    echo "Possivel ataque de upload de arquivo!<br>";
		}


	if (isset($_POST['enviar'])){


		$cadastro = "INSERT INTO produtos(nome, descricao, preco, quantidade, data, imagem) 
			VALUES ('$nome', '$descricao', '$preco', '$quantidade', '$data', '$imagem')";

		$conexao->autocommit(FALSE);

		/* Insert some values */
		$conexao->query($cadastro);

		$conexao->commit();

		printf("Cadastro realizado com sucesso<br> Clique em <a href='index.php'>HOME</a> para voltar a pagina inicial ou em <a href='pagecadastro.php'>CADASTRO</a> para retonar a página de cadastro!");
	}


?>