<?php 
	var_dump($_POST);
	if (count($_POST)>0) {
		ECHO '<br>' .$_POST ['num'];
		ECHO '<br>' .$_POST ['ender'];
		ECHO '<br>' .$_POST ['capacidade'];
		
		
		$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

		$sql = "insert into patio VALUES (?, ?, ?)";
		$comando = $conexao->prepare($sql);

		$sucesso = $comando->execute
		(
			[
				$_POST ['num'],
				$_POST ['ender'],
				$_POST ['capacidade']
			]
		);

		// se o comando for bem sucedido, monto uma mensagem amigável
		$mensagem = '';
		if ($sucesso)
		{
			$mensagem = "Patio cadastrado!";
		}
		else
		{
			// se deu erro, a mensagem não será tão amigável :(
			$mensagem = "Erro: " . $comando->errorInfo()[2];
		}
		// uso um cookie para passar a mensagem para a página de clientes
		setcookie('mensagem', $mensagem);

		//REDIRECIONA PARA A PÁGINA CLIENTES.PHP
		header('location: patios.php');
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
				<li><a href="patios.php">Pátios</a></li>
				<li class="ativo"><a href="clientes.php">Clientes</a></li>
				<li><a href="veiculos.php">Veículos</a></li>
				<li><a href="modelos.php">Modelos</a></li>
			</ul>
		</nav>
	</header>
	<div id="container">
		<main>
			<h2>Novo pátio</h2>
			<form action="cadpatio.php" method="post">
				<p>
					<label for="num">Número do patio:</label>
					<input type="number" name="num" id="num">
				</p>
				<p>
					<label for="enderec">Endereço:</label>
					<input type="text" name="ender" id="ender">
				</p>
				<p>
					<label for="capac">Capacidade:</label>
					<input type="number" name="capacidade" id="capacidade">
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