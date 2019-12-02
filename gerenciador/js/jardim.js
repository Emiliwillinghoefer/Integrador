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
	campo = document.getElementById("cliente");
	erro = document.getElementById("msg-cliente");
	if(campo.value == "")
		mostraErro(erro, "Por favor selecione o Nome ");
	else
		ocultaErro(erro);


	// validação do campo endereco
	campo = document.getElementById("endereco");
	erro = document.getElementById("msg-endereco");
	if(campo.value == "")
		mostraErro(erro, "Por favor digite o Endereço completo");
	else
		ocultaErro(erro);

	// validação do campo bairro
	campo = document.getElementById("nomeJardim");
	erro = document.getElementById("msg-nomeJardim");
	if(campo.value == "")
		mostraErro(erro, "Por favor selecione o nome do jardim");
	else
		ocultaErro(erro);

	campo = document.getElementById("data");
	erro = document.getElementById("msg-data");
	if(campo.value == "")
		mostraErro(erro, "Por favor, escolha a data");
	else
		ocultaErro(erro);





	if(contErros > 0)
		return false;
	else
		alert("Agendamento realizado"); // será removido futuramente
}
