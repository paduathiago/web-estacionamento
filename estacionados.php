<?php
	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	$sql = "SELECT * FROM estaciona";
	$resultado = $conexao->query($sql);

	$estacionamento = $resultado->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Estacionados - IF Park</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	
	<header>
		<h1>ℙ IF Park</h1>
	</header>
	<div id="container">
		<main>
			<h2>Carros Estacionados</h2>

			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Cód.</th>
							<th>Pátio</th>
							<th>Placa</th>
							<th>Entrada</th>
							<th>Saída</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($estacionamento as $e): ?>
						<tr>
							<td><?= $e['cod'] ?></td>
							<td><?= $e['patio_num'] ?></td>
							<td><?= $e['veiculo_placa'] ?></td>
							<td><?= $e['dtentrada'] . ' ' . $e['hsentrada'] ?></td>
							<td><?= $e['dtsaida'] . ' ' . $e['hssaida'] ?></td>
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