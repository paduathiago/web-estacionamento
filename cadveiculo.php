<?php 
	var_dump($_POST);
	if (count($_POST)>0) {
		ECHO '<br>' .$_POST ['placa'];
		ECHO '<br>' .$_POST ['modelo_codmod'];
		ECHO '<br>' .$_POST ['cliente_cpf'];
		ECHO '<br>' .$_POST ['cor'];
		
		
		$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

		$sql = "insert into veiculo VALUES (?, ?, ?, ?)";
		$comando = $conexao->prepare($sql);

		$sucesso = $comando->execute
		(
			[
				$_POST ['placa'],
				$_POST ['modelo_codmod'],
				$_POST ['cliente_cpf'],
				$_POST ['cor']
			]
		);

		// se o comando for bem sucedido, monto uma mensagem amigável
		$mensagem = '';
		if ($sucesso)
		{
			$mensagem = "veiculo cadastrado!";
		}
		else
		{
			// se deu erro, a mensagem não será tão amigável :(
			$mensagem = "Erro: " . $comando->errorInfo()[2];
		}
		// uso um cookie para passar a mensagem para a página de clientes
		setcookie('mensagem', $mensagem);

		//REDIRECIONA PARA A PÁGINA CLIENTES.PHP
		header('location: veiculos.php');
	}
?>


<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Cadastro de Pátios< </title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
		<nav>
			<ul id="menu">
				<li><a href="estacionados.php">Estacionados</a></li>
				<li><a href="veiculos.php">Pátios</a></li>
				<li class="ativo"><a href="clientes.php">Clientes</a></li>
				<li><a href="veiculos.php">Veículos</a></li>
				<li><a href="modelos.php">Modelos</a></li>
			</ul>
		</nav>
	</header>
	<div id="container">
		<main>
			<h2>Novo pátio</h2>
			<form action="cadveiculo.php" method="post">
				<p>
					<label for="placa">Placa:</label>
					<input type="text" name="placa" id="placa">
				</p>
				<p>
					<label for="modelo_codmod">Modelo:</label>
					<input type="text" name="modelo_codmod" id="modelo_codmod">
				</p>
				<p>
					<label for="capac">CPF do cliente:</label>
					<input type="number" name="cliente_cpf" id="cliente_cpf">
				</p>
				<p>
					<label for="capac">Cor:</label>
					<input type="text" name="cor" id="cor">
				</p>
				<p>
					<button type="submit">Salvar</button>
				</p>
				
			</form>
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>