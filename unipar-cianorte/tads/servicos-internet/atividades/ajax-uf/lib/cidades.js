$(document).ready(paginaCarregada);

function paginaCarregada() {
    carregarEstado();
}

function carregarEstado() {
    $.ajax({
        url: "ajax/ufs.php",
        type: "get",
        data: {},
        dataType: "json"
    })
            .done(carregarEstadoOk)
            .fail(carregarEstadoFail)
            ;
}

function carregarCidades(iduf) {
    $.ajax({
        url: "ajax/cidades.php",
        type: "get",
        data: {uf: iduf},
        dataType: "json"
    })
            .done(carregarCidadesOk)
            .fail(carregarCidadesFail)
            ;
}

function carregarCidade(idcid) {
    $.ajax({
        url: "ajax/cidade.php",
        type: "get",
        data: {id: idcid},
        dataType: "json"
    })
            .done(carregarCidadeOk)
            .fail(carregarCidadeFail)
            ;
}

function carregarEstadoOk(estados) {
    var html = '<option value="0">Selecione o UF</option>';

    for (i in estados) {
        html += '<option value="'
                + estados[i].iduf
                + '">'
                + estados[i].uf
                + '</option>'
                ;
    }

    $("#ufSelect").html(html);
    $("#ufSelect").change(selecionarEstado);
}

function carregarEstadoFail() {
    alert("Uf não carregados, arrume seu codigo");
}

function selecionarEstado() {
    var iduf = $('#ufSelect').val();
    carregarCidades(iduf);
}

function carregarCidadesOk(cidades) {
    var html = '<option value="0">Selecione a cidade</option>';

    for (i in cidades) {
        html += '<option value="'
                + cidades[i].idcidade
                + '">'
                + cidades[i].cidade
                + '</option>'
                ;
    }

    $('#cidSelect').html(html);
    $('#cidSelect').change(selecionarCidade);
}

function carregarCidadesFail() {
    alert("Cidades não carregadas, arrume seu codigo");
}

function selecionarCidade() {
    var idcid = $('#cidSelect').val();
    carregarCidade(idcid);
}

function carregarCidadeOk(cidade) {
    $('#populacao').val(cidade.populacao);
}

function carregarCidadeFail() {
    alert("Cidade não carregada, arrume seu codigo");
}

