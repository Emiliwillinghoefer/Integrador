document.getElementById("form-cliente").onsubmit = validaCadastro;



function mostraErro(idErro, mensagem){
	idErro.style.display = "block";
	idErro.innerHTML = mensagem;
	contErros++;
}


function ocultaErro(idErro){
	idErro.style.display = "none";
}

function validaCadastro(){

	contErros = 0;

		// validação do campo nome
	campo = document.getElementById("desc");
	erro = document.getElementById("msg-desc");
	if(campo.value == "")
		mostraErro(erro, "Por favor digite o nome do produto");		
	else
		ocultaErro(erro);


	// validação do campo endereco
	campo = document.getElementById("categoria");
	erro = document.getElementById("msg-categoria");
	if(campo.value == "")
		mostraErro(erro, "Por favor selecione a categoria");
	else
		ocultaErro(erro);

	// validação do campo bairro
	campo = document.getElementById("qtd");
	erro = document.getElementById("msg-qtd");
	if(campo.value == "")
		mostraErro(erro, "Por favor digitea quantidade");
	else
		ocultaErro(erro);


	campo = document.getElementById("custo");
	erro = document.getElementById("msg-custo");
	if(campo.value == "")
		mostraErro(erro, "Por favor digite o valor");
	else
		ocultaErro(erro);


	campo = document.getElementById("venda");
	erro = document.getElementById("msg-venda");
	if(campo.value == "")
		mostraErro(erro, "Por favor digite o valor");
	else
		ocultaErro(erro);
	

	if(contErros > 0)
		return false;
	else
		alert("Agendamento realizado"); // será removido futuramente
}