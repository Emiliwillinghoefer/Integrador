document.getElementById("jardim").onclick = function(){
	document.getElementById("tabela").style.display = 'initial';
	document.getElementById("table").style.display = 'none';

};

document.getElementById("manutencao").onclick = function(){
	document.getElementById("tabela").style.display = 'none';
	document.getElementById("table").style.display = 'initial';
};



document.getElementById("botao").onsubmit = validaCadastro;

function updateURL(elem) {
	document.getElementById('linkAdicionaProduto').setAttribute('href', 'adicionaProduto.php?nomeJardim=' + elem.value + '');
}

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
	campo = document.getElementById("nome");
	erro = document.getElementById("msg-nome");
	if(campo.value == "")
		mostraErro(erro, "Por favor selecione o Nome ");
	else
		ocultaErro(erro);


	// validação do campo endereco
	campo = document.getElementById("nomejardim");
	erro = document.getElementById("msg-nomejardim");
	if(campo.value == "")
		mostraErro(erro, "Por favor digite o nome do jardim ");
	else
		ocultaErro(erro);




	if(contErros > 0)
		return false;
	else
		alert("Cadastro realizado"); // será removido futuramente
}
