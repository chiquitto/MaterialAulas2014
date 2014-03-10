window.onload = carregou;
function carregou() {
	document.getElementById('tipof').onclick = mostrarcpf;
	
	document.getElementById('tipoj').onclick = mostrarcnpj;
}
function mostrarcpf() {
	document.getElementById('divcpf').style.display = 'block';
	document.getElementById('divcnpj').style.display = 'none';
}
function mostrarcnpj() {
	document.getElementById('divcnpj').style.display = 'block';
	document.getElementById('divcpf').style.display = 'none';
}
