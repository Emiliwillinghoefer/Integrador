
function mostraErro(idErro, mensagem){
	idErro.style.display = "block";
	idErro.innerHTML = mensagem;
	contErros++;
}


function ocultaErro(idErro){
	idErro.style.display = "none";
}

document.getElementById("busca").onclick = function(){

	campo = document.getElementById("data");
	erro = document.getElementById("msg-data");
	if(campo.value == "")
		mostraErro(erro, "Por favor selecione a data");		
	else
		window.location.href = "agenda2.html";
		ocultaErro(erro);
} 