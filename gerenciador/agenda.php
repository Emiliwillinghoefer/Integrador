<?php include "includes/cabecalho.php"; ?>
	<nav>
		<div class="titulo">
		<a href="agenda.php"><img src="imagens/seta.png"></a>
		<h2>Agenda</h2>
	</div>
		<?php include "includes/menulateral.php" ?>
		</nav>
			<form class="" method="post" action="agenda2.php">
				<div class="data" >


			<label>Selecine a data:</label>
			<input type="date" name="data" id="data">
			<span class="msg-erro" id="msg-data"></span>
			<input type="submit" name="busca" id="busca" value="Busca">
		</div>

			</form>
			<?php
			if(isset($_POST['busca'])){
			if(!empty($_POST['data'])){
				header("Location: agenda2.php");
			}
			else {
				echo "Selecione uma data";
			}
}
			 ?>
<?php include "includes/rodape.php"; ?>
