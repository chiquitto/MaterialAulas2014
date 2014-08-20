$(document).ready(paginaCarregada);

function paginaCarregada() {
    carregarEstado();
}

function mostrarLoading() {
    $('#loading').show();
}

function ocultarLoading() {
    $('#loading').hide();
}

function carregarEstado() {
    mostrarLoading();
    
    $.ajax({
        url: "api/estados",
        type: "get",
        data: {},
        dataType: "json"
    })
            .done(carregarEstadoOk)
            .fail(carregarEstadoFail)
            .always(ocultarLoading)
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
}

function carregarEstadoFail() {
    alert("Uf não carregados, arrume seu codigo");
}
