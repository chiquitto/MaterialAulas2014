//onsubmit

window.onload = function () {
	document.getElementById('form1').onsubmit = validarFormulario;
}

function focar(campo, foco) {
	if (foco == '') {
		return campo;
	}
	return foco;
}

function validarFormulario() {
	//alert('Oi mundo');
	
	var ok = true;
	var msg = '';
	var foco = '';
	
	var nome = document.getElementById('nome').value;
	if (nome == '') {
		ok = false;
		msg += 'Informe seu nome \n';
		foco = focar('nome', foco);
	}
	
	var email = document.getElementById('email').value;
	if (email == '') {
		ok = false;
		msg += 'Informe seu email \n';
		foco = focar('email', foco);
	}
	
	var senha = document.getElementById('senha').value;
	if (senha == '') {
		ok = false;
		msg += 'Informe sua senha \n';
		foco = focar('senha', foco);
	}
	else {
		var senha2 = document.getElementById('senha2').value;
		if (senha != senha2) {
			ok = false;
			msg += 'Informe o campo repita a senha \n';
			foco = focar('senha2', foco);
		}
	}
	
	var idade = document.getElementById('idade').value;
	
	if (idade == '') {
		ok = false;
		msg += 'Informe sua idade \n';
		foco = focar('idade', foco);
	}
	else {
		idade = parseInt(idade, 10);
		if (idade < 18) {
			ok = false;
			msg += 'A idade deve ser maior ou igual a 18 \n';
			foco = focar('idade', foco);
		}
	}
	
	var sexoM = document.getElementById('sexoM').checked;
	var sexoF = document.getElementById('sexoF').checked;
	
	if ((sexoM == false) && (sexoF == false)) {
		ok = false;
		msg += 'Informe seu sexo \n';
		foco = focar('sexoM', foco);
	}
	
	if (ok == false) {
		window.alert(msg);
		document.getElementById(foco).focus();
	}
	
	return ok;
}