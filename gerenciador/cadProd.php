<?php include "includes/cabecalho.php"; ?>
	<nav>
		<div class="titulo">
			<a href="index.php"><img src="imagens/seta.png"></a>
			<h2>Cadastro Produto</h2>
		</div>
		<?php include "includes/menulateral.php"?>
	</nav>
	<div class="col-2">
		<form action="" method="post" id="form-cliente">
					<div class="form-item">
				      <label for="desc" class="rotulo">Descrição:</label>
				      <input type="text" id="desc" name="namep" size="50" placeholder="Orquidea phalaenopsis">
				      <span class="msg-erro" id="msg-desc"></span>
				    </div>

				    <div class="categoria">
				      <label for="categoria" class="rotulo">Categoria:</label>
				      <select name="cat" id="categoria">
					    <option value="">Selecione a categoria</option>
					    <option>Planta</option>
					    <option>Decoração</option>
					    <option>Grama</option>
					    <option>Vasos</option>
					    <option>Terra</option>
					  </select>
					  <span class="msg-erro" id="msg-categoria"></span>

				    </div>
				    <div class="form-item">
				    	<label class="rotulo">Quantidade:</label>
				    	<input type="text" name="quant" id="qtd" placeholder="00">
				    	<span class="msg-erro" id="msg-qtd"></span>
				    </div>
				    <div class="form-item">
				    	<label class="rotulo">Valor de custo:</label>
				    	<input type="text" name="valuepg" id="custo" placeholder="R$ 0,00">
				    	<span class="msg-erro" id="msg-custo"></span>
				    </div>

				    <div class="form-item">
				    	<label class="rotulo">Valor de venda:</label>
				    	<input type="text" name="valuevd" id="venda" placeholder="R$ 0,00">
				    	<span class="msg-erro" id="msg-venda"></span>
				    </div>
						<div class="data">
							<label for="data" class="rotulo">Data da compra:</label>
					        <input type="date" id="data" name="dtcomp" size="50" >
						    <span class="msg-erro" id="msg-data"></span>
						</div>
				    <div class="fornecedor">
				    	<label class="rotulo">Fornecedor:</label>
				    	<input type="text" name="fornecedor" id="fornecedor">
				    	<span class="msg-erro" id="msg-fornecedor"></span>

				    </div>
				    <div class="form-item">
				    	<label class="rotulo"></label>
				    	<input type="submit" id="botao" name="submeter"value="Confirmar">

				    </div>

		</form>
		<!-- <script src="js/produto.js"></script> -->

<?php
include_once "classes/Consulta.php";
$consulta = new Consulta();

$erros = array();
if (isset($_POST['submeter'])){

	$descricao = $_POST['namep'];
	$cate = ($_POST['cat'] == '') ? NULL : $_POST['cat'];
	$quant = $_POST['quant'];
	$valorcu = $_POST['valuepg'];
	$valorve = $_POST['valuevd'];
	$data = $_POST['dtcomp'];
	$dataatual = date('Y-m-d');
	$fornecedor=$_POST['fornecedor'];

	if(empty($descricao)){
		$erros[] = "A descrição não pode ser vazio";
	}

	if(!$cate){
		$erros[] = "Selecione a categora";
	}

	if(empty($quant)){
		$erros[] = "A quantidade não pode ser vazio";
	}

	if(!is_numeric($quant)){
		$erros[] = "A quantidade precisa ser um número";
	}
	if(empty($valorcu)){
		$erros[] = "O valor de custo não pode ser vazio";
	}

	if(!is_numeric($valorcu)){
		$erros[] = "O valor  precisa ser um número";
	}if(empty($valorve)){
		$erros[] = "O valor de venda não pode ser vazio";
	}
	if(!is_numeric($valorve)){
		$erros[] = "O valor de venda precisa ser um número";
	}
	if(empty($data)){
		$erros[] = "O endereco não pode ser vazio";
	}
	if ($data>$dataatual) {
		$erros[] = "A data selecionada é invalida";
	}
	if(empty($fornecedor)){
		$erros[] = "O Fornecedor não pode ser vazio";
	}

	if(count($erros) == 0){
		$enviar = $consulta->cadProdutos();
		$id = $consulta->consultaCod($_POST['namep']);
		$_SESSION['codProd'] =	$id[0]['cod'];
		if($enviar){
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
<?php include "includes/rodape.php"; ?>
