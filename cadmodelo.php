<?php 
	var_dump($_POST);
	if (count($_POST)>0) {
		ECHO '<br>' .$_POST ['codmod'];
		ECHO '<br>' .$_POST ['desc_2'];
		
		
		$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

		$sql = "insert into Modelo VALUES (?, ?)";
		$comando = $conexao->prepare($sql);

		$sucesso = $comando->execute
		(
			[
				$_POST ['codmod'],
				$_POST ['desc_2']
			]
		);

		// se o comando for bem sucedido, monto uma mensagem amigável
		$mensagem = '';
		if ($sucesso)
		{
			$mensagem = "Modelo cadastrado!";
		}
		else
		{
			// se deu erro, a mensagem não será tão amigável :(
			$mensagem = "Erro: " . $comando->errorInfo()[2];
		}
		// uso um cookie para passar a mensagem para a página de Modelos
		setcookie('mensagem', $mensagem);

		//REDIRECIONA PARA A PÁGINA ModeloS.PHP
		header('location: modelos.php');
	}
?>


<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Cadastro de Modelos< </title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
		<nav>
			<ul id="menu">
				<li><a href="estacionados.php">Estacionados</a></li>
				<li><a href="patios.php">Pátios</a></li>
				<li class="ativo"><a href="modelos.php">Modelos</a></li>
				<li><a href="veiculos.php">Veículos</a></li>
				<li><a href="modelos.php">Modelos</a></li>
			</ul>
		</nav>
	</header>
	<div id="container">
		<main>
			<h2>Novo Modelo</h2>
			<form action="cadmodelo.php" method="post">
				<p>
					<label for="codmod">Código do modelo:</label>
					<input type="number" name="codmod" id="codmod">
				</p>
				<p>
					<label for="desc_2">Descrição do Modelo:</label>
					<input type="text" name="desc_2" id="desc_2">
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