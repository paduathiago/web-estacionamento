<?php 

	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	$sql = "SELECT * FROM veiculo";
	$resultado = $conexao->query($sql);

	$veiculo = $resultado->fetchAll();

	// verifico se tem mensagem pra ser exibida ao usuário.
	$mensagem = "";
	if (isset($_COOKIE['mensagem']))
	{
		$mensagem = $_COOKIE['mensagem'];
		// depois que exibo a mensagem, devo retirá-la
		// dos cookies.
		setcookie('mensagem', '', 1);
	}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Clientes - IF Park</title>
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
			<h2>Veiculos</h2>
			<?php if(!empty($mensagem)): ?>
				<div id="mensagem">
					<?= $mensagem; ?>
				</div>
			<?php endif; ?>
			<p>
				<a href="cadveiculo.php">Criar novo Veículo</a>
			</p>

			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Placa</th>
							<th>Modelo</th>
							<th>CPF do cliente</th>
							<th>Cor</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($veiculo as $v): ?>
						<tr>
							<td><?= $v['placa'] ?></td>
							<td><?= $v['modelo_codmod'] ?></td>
							<td><?= $v['cliente_cpf'] ?></td>
							<td><?= $v['cor'] ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>	
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>