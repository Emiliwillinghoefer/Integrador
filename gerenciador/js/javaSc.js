
document.getElementById("perfilC").onclick = function(){
	document.getElementById("CPF").disabled = false;
	document.getElementById("CNPJ").disabled = true;
	document.getElementById("mensagem-empresa").style.display = "block";
};

document.getElementById("perfilP").onclick = function(){
	document.getElementById("CNPJ").value = "";
	document.getElementById("CPF").disabled = true;
	document.getElementById("CNPJ").disabled = false;
	document.getElementById("mensagem-empresa").innerHTML = "";
	document.getElementById("mensagem-empresa").style.display = "none";
};

// document.getElementById("form-cliente").onsubmit = validaCadastro;

// function mostraErro(idErro, mensagem){
// 	idErro.style.display = "block";
// 	idErro.innerHTML = mensagem;
// 	contErros++;
// }
// document.getElementById("CPF").onkeypress=function(){
// 	var a = document.getElementById("CPF").value;
// 	erro = document.getElementById("msg-CPF");
// 	if(a.length==3 || a.length==7){
// 		a+=".";
// 	}
// 	if(a.length==11){
// 		a+="-";
// 	}
//
// 	document.getElementById("CPF").value=a;
// 	document.getElementById("CPF").innerHTML="";
// 	if (a.length!=13){
// 		mostraErro(erro, "CPF incorreto");
// 	}
// 	else
// 		ocultaErro(erro);
//
// }
// document.getElementById("CNPJ").onkeypress=function(){
// 	var a = document.getElementById("CNPJ").value;
// 	erro = document.getElementById("msg-CNPJ");
// 	if(a.length==2 || a.length==6){
// 		a+=".";
// 	}
// 	if(a.length == 10){
// 		a+="/";
// 	}
// 	if(a.length==14){
// 		a+="-";
// 	}
//
// 	document.getElementById("CNPJ").value=a;
// 	document.getElementById("CNPJ").innerHTML="";
// 	if (a.length!=16){
// 		mostraErro(erro, "CNPJ incorreto");
// 	}
// 	else{
// 		ocultaErro(erro);
// 	}
//
// }
// function ocultaErro(idErro){
// 	idErro.style.display = "none";
// }
//
// function validaCadastro(){
//
// 	contErros = 0;
//
// 		// validação do campo nome
// 	campo = document.getElementById("nome");
// 	erro = document.getElementById("msg-nome");
// 	if((campo.value == "") || (campo.value.indexOf(" ") == -1))
// 		mostraErro(erro, "Por favor digite o Nome completo");
// 	else
// 		ocultaErro(erro);
//
//
// 	// validação do campo endereco
// 	campo = document.getElementById("endereco");
// 	erro = document.getElementById("msg-endereco");
// 	if(campo.value == "")
// 		mostraErro(erro, "Por favor digite o Endereço completo");
// 	else
// 		ocultaErro(erro);
//
// 	// validação do campo bairro
// 	campo = document.getElementById("bairro");
// 	erro = document.getElementById("msg-bairro");
// 	if(campo.value == "")
// 		mostraErro(erro, "Por favor selecione o Bairro");
// 	else
// 		ocultaErro(erro);
//
// 	// validação do campo perfil
// 	var perfilP = document.getElementById("perfilP");
// 	var perfilC = document.getElementById("perfilC");
// 	erro = document.getElementById("msg-perfil");
// 	if(!perfilP.checked & !perfilC.checked)
// 		mostraErro(erro, "Por favor selecione o Perfil");
// 	else
// 		ocultaErro(erro);
//
// 		// validação do campo bairro
// 	campo = document.getElementById("numero");
// 	erro = document.getElementById("msg-numero");
// 	if(campo.value == "")
// 		mostraErro(erro, "Por favor digite o número da casa");
// 	else
// 		ocultaErro(erro);
//
// 		// validação do campo bairro
// 	campo = document.getElementById("telefone");
// 	erro = document.getElementById("msg-telefone");
// 	if(campo.value == "")
// 		mostraErro(erro, "Por favor digite seu telefone");
// 	else
// 		ocultaErro(erro);
//
//
//
//
//
// 	if(contErros > 0)
// 		return false;
// 	else
// 		alert("Cadastro realizado com sucesso"); // será removido futuramente
// }
