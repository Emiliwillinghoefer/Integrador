<?php include "includes/cabecalho.php"; ?>
		<link rel="stylesheet" href="css/agenda.css">
		<nav>
		<div class="titulo">
		<a href="agenda.php"><img src="imagens/seta.png"></a>
		<h2>Agenda do dia <?php echo data($_POST['data']);?></h2>

		</div>

		<?php include "includes/menulateral.php";
		function data($data){
    	return date("d/m/Y", strtotime($data));
		}

		 ?>
	</nav>
	<div class="col-2">
		<?php
		include "classes/Consulta.php";
		$consulta = new Consulta();
		$result = $consulta->agenda($_POST['data']);
		foreach ($result as $key) {
			?>
			<div class="cons">
				<label>Seviço: <span><?=$key['nameser']?></span></label>		<br><br>
				<label>Endereço: <?=$key['endereco']?></label><br><br>
				<label>Cliente: <?=$key['ncliente']?></label><br><br>
			</div>
			<br>
		<?php }	 ?>


	</div>
	<?php include "includes/rodape.php"; ?>
