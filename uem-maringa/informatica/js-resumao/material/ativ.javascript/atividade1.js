window.onload = paginaCarregada;
function paginaCarregada() {
	document.getElementById('clicar1').onclick = fclicar1;
	document.getElementById('clicar2').onclick = fclicar1;
}
function fclicar1() {
	var c = document.getElementById('clicar1').checked || document.getElementById('clicar2').checked;
	
	if (c) {
		document.getElementById('corpo').className = 'verde';
	}
	else {
		document.getElementById('corpo').className = 'vermelho';
	}
}