<?php 
	var_dump($_POST);
	if (count($_POST)>0) {
		ECHO '<br>' .$_POST ['cpf'];
		ECHO '<br>' .$_POST ['nome'];
		ECHO '<br>' .$_POST ['data_nasc'];
		
		
		$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

		$sql = "insert into Cliente VALUES (?, ?, ?)";
		$comando = $conexao->prepare($sql);

		$sucesso = $comando->execute
		(
			[
				$_POST ['cpf'],
				$_POST ['nome'],
				$_POST ['data_nasc']
			]
		);

		// se o comando for bem sucedido, monto uma mensagem amigável
		$mensagem = '';
		if ($sucesso)
		{
			$mensagem = "Cliente cadastrado!";
		}
		else
		{
			// se deu erro, a mensagem não será tão amigável :(
			$mensagem = "Erro: " . $comando->errorInfo()[2];
		}
		// uso um cookie para passar a mensagem para a página de clientes
		setcookie('mensagem', $mensagem);

		//REDIRECIONA PARA A PÁGINA CLIENTES.PHP
		header('location: clientes.php');
	}
?>


<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Cadastro de Clientes< </title>
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
			<h2>Novo cliente</h2>
			<form action="cad_cliente.php" method="post">
				<p>
					<label for="cpf">CPF:</label>
					<input type="number" name="cpf" id="cpf">
				</p>
				<p>
					<label for="nome">Nome:</label>
					<input type="text" name="nome" id="nome">
				</p>
				<p>
					<label for="data_nasc">Data de Nascimento</label>
					<input type="date" name="data_nasc" id="data_nasc">
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