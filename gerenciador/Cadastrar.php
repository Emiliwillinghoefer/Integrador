<?php include "includes/cabecalho.php"; ?>
	<nav>
		<div class="titulo">
		<a href="cadJardim.php"><img src="imagens/seta.png"></a></a>
		<h2>Cadastrar serviço</h2>
 		</div>
 		<?php include "includes/menulateral.php" ?>
	</nav>
	<div class="col-2">
		<form method="post" id="form-cliente">


				    <div class="form-item">

					  <span class="msg-erro" id="msg-nome"></span>
				    </div>
				    <div class="form-item">
				      <label for="nome" class="rotulo" >Nome do serviço:</label>
				      <input type="text" name="nomejardim" id="nomejardim" onchange="updateURL(this)">
					  <span class="msg-erro" id="msg-nomejardim"></span>
				    </div>
				     <br>
				    <br>	<br>
				<label><input type="radio" name="name" value="j"  id="jardim" onclick="jardim()">Jardim</label>
				  	<!-- <button name="adiciona"><img src="iconMais.png" width="20"><a href="#" id="linkAdicionaProduto"> Adicionar mais produtos</a></button> -->
					<label>
					<input type="radio" name="name" value="m"  id="manutencao">Manutenção</label>
					<br>


				<div class="conflimp">
				    <label class="rotulo"></label>
				    <input type="submit" id="botao" value="Confirmar" name="validar">

				    <label class="rotulo"></label>
				    <input type="reset" id="botao" value="Limpar">
				</div>


		</form>
		<?php
		include_once "classes/Consulta.php";
		$consulta = new Consulta();
		// echo $cliente;
		// print_r($consulta);


		if (isset($_POST['validar'])){


			$nomejardim = $_POST['nomejardim'];

			// if(!isset(($_POST['name'])=='j')&&!isset(($_POST['name'])=='m')){
			// 	$erros[] = "Selecione algum tipo de serviço";
			// }

			if(empty($nomejardim)){
				$erros[] = "O Nome do serviço não pode ser vazio";
			}

			if(is_numeric($nomejardim)){
				$erros[] = "O nome do serviço não pode conter números";
			}

			if(count($erros) == 0){
				$cons = $consulta->insereServico($_POST['nomejardim'],$_POST['name']);
				if ($_POST['name'] == 'j') {
					?>
					<a href="#" id="linkAdicionaProduto">
						<?php
						$id = $consulta->consultaID($_POST['nomejardim']);
						$_SESSION['id'] =	$id[0]['id'];
				header("Location: adicionaProduto.php?");
				}
				if ($_POST['name'] == 'm') {
					$id = $consulta->consultaID($_POST['nomejardim']);
					$_SESSION['id'] =	$id[0]['id'];
					header("Location: manutencao.php");
				}
				if($cons){
					$mensagem = "Cadastado com sucesso";
				}
				else{
					$mensagem = "Erro. O review não pôde ser cadastrado. ";
				}
			}
		}
		if(isset($mensagem)){
			echo "<p>$mensagem</p>";
		}
		else{
			if(isset($erros)){
				foreach ($erros as $erro){
					echo "<li style='color: red;'>$erro</li>";
				}
				echo "</ul><br>";
			}
		}


		?>

	</div>
	<script src="js/cadastrar.js"></script>
	<?php include "includes/rodape.php"; ?>


<?php

	// include_once "classes/Consulta.php";
	// $consulta = new Consulta();
	//
	// // print_r($consulta);
	// if (isset($_POST['validar'])){
	// 		$cons = $consulta->insereServico($_POST['nomejardim'],$_POST['name']);
	// }

 ?>
