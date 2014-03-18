window.onload = function() {
	document.getElementById('uf').onchange = ufAlterado;
}

var ufs = new Array();
ufs[1] = new Array('Cianorte', 'Curitiba', 'Maringá');
ufs[2] = new Array('Florianopolis', 'Penha', 'Blumenal');
ufs[3] = new Array('Internacional', 'Gremio', 'Porto Alegre');

var ufsCapital = new Array();
ufsCapital[1] = 1;
ufsCapital[2] = 0;
ufsCapital[3] = 2;

function ufAlterado() {
	var ufSelecionado = this.value;
	if (ufSelecionado == '') {
		return false;
	}
	ufSelecionado = Number(ufSelecionado);

	var cidadeElemento = document.getElementById('cidade');

	cidadeElemento.innerHTML =
		montarHtmlOptions(ufs[ufSelecionado]);

	cidadeElemento.selectedIndex = ufsCapital[ufSelecionado] + 1;
	cidadeElemento.disabled = false;
}

function montarHtmlOptions(cidades) {
	var html = '<option value="">Selecione ...</option>';
	for(var i = 0; i < cidades.length; i++) {
		html += '<option value="' + i + '">' + cidades[i] + '</option>';
	}
	return html;
}