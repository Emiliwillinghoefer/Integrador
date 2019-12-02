<!DOCTYPE html>
<html>
<head>
	<title>Gerenciador</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
	<header>
		<h1><a href="index.php">Gerenciador Art Flores</a></h1>

		<div class="cabecalho">
		<span><img src="imagens/login.png" width="40" > Bem vindo
		<?php
		session_start();
		if (isset($_SESSION['adm'])) {
				echo $_SESSION['adm'];
		}
		else {
			header("Location: login.php");
		}

		 ?>
		 <br>
		 <a href="sair.php">Sair</a>
	 </span>
		</div>

	</header>
