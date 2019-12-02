
<?php include "includes/cabecalho.php"; ?>
	<nav>
		<div class="titulo">
			<a href="index.php"><img src="imagens/seta.png"></a>
			<h2>Agendamento de serviço</h2>
		</div>
		<?php
		 include "includes/menulateral.php";

		 ?>
	</nav>
	<div class="col-2">
		<form action="" method="post" id="form-cliente">
			<?php
			include_once "classes/Consulta.php";
			$consulta = new Consulta();
			?>
			<div class="form-item">
			    <label for="nome" class="rotulo" >Nome do cliente:</label>

					<select name="cliente" method="POST" id="cliente" >
			 				<?php
					 $result = $consulta->consultaCliente();
					 print_r($result);
					 foreach ($result as $key => $value ) {
							 ?>
							 <option value="<?= $result[$key]['nome']?>">
									 <?php
											 echo $result[$key]['nome'];
										?>
							 </option>
						 <?php }?>

	 			</select><br>
				<span class="msg-erro" id="msg-nome"></span>
			</div>
			<div class="form-item">
			    <label for="nome" class="rotulo" >Nome do jardim:</label>
			    <select name="idser" id="nomeJardim" method="POST">
						<?php
								$result = $consulta->consultaServico();
								foreach ($result as $nome =>$value) {
									?>
										<option value="<?=$result[$nome]['id']?>">

											<?php
											 echo $result[$nome]['nameser'];

											 ?>

										</option>

						<?php	}

							print_r($_POST['cliente']);
							?>
				</select>
				<span class="msg-erro" id="msg-nomeJardim"></span>
			</div>
			<div class="form-item">
			    <label>Endereço: </label>
				<input type="text" name="end" id="endereco" size="50">
			 	<span class="msg-erro" id="msg-endereco"></span>
			</div>
			<div class="data">
				<label for="data" class="rotulo">Data agendada:</label>
		        <input type="date" id="data" name="data" size="50" >
			    <span class="msg-erro" id="msg-data"></span>
			</div>
			<br>
			<div class="form-item">
			    <input type="submit" name="submit" id="botao" value="Confirmar">
			    <input type="reset" id="botao" value="Limpar">
			   <a href="Cadastrar.php"><input type="button" name="botao" value="Cadastrar novo serviço"></a>
			</div>
		</form>

		<?php
		$erros = array();
		if(isset($_POST['submit'])){

			$cliente = ($_POST['cliente']== '') ? NULL : $_POST['cliente'];
			$idserv = ($_POST['idser'] == '') ? NULL : $_POST['idser'];
			$endereco = $_POST['end'];
			$data = $_POST['data'];
			$dataatual = date('Y-m-d');
			if(!$cliente){
				$erros[] = "Selecione o nome do cliente";
			}

			if(!$idserv){
				$erros[] = "Selecione o nome do jardim";
			}

			if(empty($endereco)){
				$erros[] = "O endereco não pode ser vazio";
			}

			if(is_numeric($endereco)){
				$erros[] = "Endereço não pode conter números";
			}
			if(empty($data)){
				$erros[] = "O endereco não pode ser vazio";
			}
			if ($data<$dataatual) {
				$erros[] = "A data selecionada é invalida";
			}

			if(count($erros) == 0){
				$res = $consulta->insereAgenda();
				print_r($res);
				if($res){
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
<script src="js/jardim.js"></script>
	</div>
	<?php include "includes/rodape.php"; ?>
