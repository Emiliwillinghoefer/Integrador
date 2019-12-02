<?php include "includes/cabecalho.php"; ?>
	<nav>
		<div class="titulo">
		<a href="index.php"><img src="imagens/seta.png"></a>
		<h2>Cadastro Cliente</h2>
		</div>
		<?php include "includes/menulateral.php" ?>
	</nav>
	<div class="col-2">
		<form action="" method="post" id="form-cliente">
					<div class="form-item">
				      <label for="nome" class="rotulo">Nome:</label>
				      <input type="text" id="nome" name="nome" size="50" placeholder="Nome completo">
				      <span class="msg-erro" id="msg-nome"></span>
				    </div>

				  	<div class="form-item">
				      <label class="rotulo"></label>
				      <label><input type="radio" name="name" value="c" id="perfilC" checked >Pessoa física</label>
				      <label><input type="radio" name="name" value="p" id="perfilP" >Pessoa jurídica</label>
					  <span class="msg-erro" id="msg-perfil"></span>
				  	</div>

				  	<div class="form-item">
				      <label for="empresa" class="rotulo">CPF :</label>
				      <input type="text" id="CPF" name="cpf" placeholder="000.000.000-00"> <span id="mensagem-empresa"></span>
				      <span id="msg-CPF"></span>
				    </div>

				    <div class="form-item">
				      <label for="empresa" class="rotulo">CNPJ :</label>
				      <input type="text" id="CNPJ" name="cnpj" disabled placeholder="00.000.000/000-00"> <span id="mensagem-empresa"></span>
				      <span id="msg-CNPJ"></span>
				    </div>

				    <div class="form-item">
				      <label for="endereco" class="rotulo">Logradouro:</label>
				      <input type="text" id="endereco" name="endereco" placeholder="Rua xxx xxx" size="50">
				      <span class="msg-erro" id="msg-endereco"></span>
				    </div>

				    <div class="form-item">
				      <label for="bairro" class="rotulo">Bairro:</label>
				      <select name="bairro" id="bairro">
					    <option value="">Selecione o bairro</option>
					    <option>Centro</option>
					    <option>Efapi</option>
					    <option>Presidente Médici</option>
					    <option>Jardim Itália</option>
					    <option>Maria Goretti</option>
					  </select>
					  <span class="msg-erro" id="msg-bairro"></span>
				    </div>
				    <div class="form-item">
				    	<label class="rotulo">Número:</label>
				    	<input type="text" name="numero" id="numero" placeholder="xx">
				    	<span class="msg-erro" id="msg-numero"></span>
				    </div>
				    <div class="form-item">
				    	<label class="rotulo">Complemento:</label>
				    	<input type="text" name="complemento" id="comlemento">
				    	<span class="msg-erro" id="msg-comlemento"></span>
				    </div>
				    <div class="form-item">
				    	<label class="rotulo">Telefone:</label>
				    	<input type="text" name="telefone" id="telefone" placeholder="(xx)xxxxx-xxxx">
				    	<span class="msg-erro" id="msg-telefone"></span>
				    </div>
				    <div class="form-item">
				    	<label class="rotulo"></label>
				    	<input type="submit" id="botao" name="validar"value="Confirmar">
				       	<label class="rotulo"></label>
				    	<input type="reset" id="botao" value="Limpar">
				    </div>
		</form>

<?php
include_once "classes/Consulta.php";
$consulta = new Consulta();

$erros = array();
if (isset($_POST['validar'])){

	$nome = $_POST['nome'];
	$logradouro = $_POST['endereco'];
	$numero = $_POST['numero'];
	$telefone = $_POST['telefone'];


	if(empty($nome)){
		$erros[] = "O nome não pode ser vazio";
	}

	if(empty($logradouro)){
		$erros[] = "O logradouro não pode ser vazio";
	}

	if(!is_numeric($numero)){
		$erros[] = "O número precisa ser numérico";
	}
	if(empty($numero)){
		$erros[] = "O número não pode ser vazio";
	}

	if(!is_numeric($telefone)){
		$erros[] = "O telefone precisa ser um número";
	}
	if(empty($telefone)){
		$erros[] = "O telefone não pode ser vazio";
	}

	if(count($erros) == 0){
		if (!empty($_POST['cpf'])) {
			$cons = $consulta->insertFisico();

		}else{
			$cons = $consulta->insertJuridico();
		}
		if($cons){
			$mensagem = "Cadastado com sucesso";
		}

		else{
			$mensagem = "Erro. O review não pôde ser cadastrado. ";
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
}
?>
</div>
<script src="js/javaSc.js"></script>
<?php include "includes/rodape.php"; ?>
