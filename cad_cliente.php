<?php 
	var_dump($_POST);
	if (count($_POST)>0) {
		ECHO '<br>' .$_POST ['cpf'];
		ECHO '<br>' .$_POST ['nome'];
		ECHO '<br>' .$_POST ['data_nasc'];
		
		
		$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

		$sql = "insert into Cliente VALUES (?, ?, ?)";
		$comando = $conexao->prepare($sql);

		$comando->execute
		(
			[
				$_POST ['cpf'],
				$_POST ['nome'],
				$_POST ['data_nasc']
			]
		);

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