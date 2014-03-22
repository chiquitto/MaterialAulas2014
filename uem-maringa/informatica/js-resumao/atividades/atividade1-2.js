window.onload = function() {
    var uf = document.getElementById('uf');
    
    uf.onchange = ufChange;
}

var cidades = new Array();
cidades[1] = new Array('Curitiba', 'Marialva', 'Maringá');
cidades[2] = new Array('Cabo Frio', 'Rio de Janeiro', 'Volta Redonda');
cidades[3] = new Array('Bauru', 'São Paulo', 'Sorocaba');

var capitais = new Array();
capitais[1] = 0;
capitais[2] = 1;
capitais[3] = 1;

function ufChange() {
    var v = this.value;
    v = Number(v);
    
    var html = montarHtml(cidades[v]);
    
    var cidade = document.getElementById('cidade');
    cidade.innerHTML = html;
    cidade.disabled = false;
    cidade.selectedIndex = capitais[v] + 1;
}

function montarHtml(c) {
    var html = '<option value="">Selecione</option>';
    
    for (var i = 0; i < c.length; i++) {
        html = html + '<option value="' + i + '">'
            + c[i]
        + '</option>';
    }
    
    return html;
}