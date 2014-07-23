var iniciar = function() {
    prepararEventos();
}

function prepararEventos() {
    $('#produtosSelecao').change(onTrocaProduto);
}

function onTrocaProduto() {
    var id = $(this).val();
    produtoCarregar(id);
}

function produtoCarregar(id) {
    $.ajax({
        type: "GET",
        url: "./ajax/produto.php",
        data: {id: id},
        dataType: "json"
    })
            .done(produtoCarregado)
            .fail(produtoFalha)
            .always(produtoAlways)
    ;
}

function produtoCarregado(produto) {
    $('#fInfoProduto').val(produto.produto);
    $('#fInfoPreco').val('R$ ' + produto.preco);
    $('#fInfoEstoque').val(produto.saldo);
}

function produtoFalha() {
    window.alert('falha');
}

function produtoAlways() {
    window.alert('sempre');
}

// window.onload = iniciar;
$(document).ready(iniciar);

/* 

function produtosIniciar() {
    prepararEventos();
}

function prepararEventos() {
    $('#produtosSelecao').change(function() {
        var id = $(this).val();
        produtoCarregar(id);
    });
}

function produtoCarregar(id) {
    $.ajax({
        type: "GET",
        url: "./ajax/produto.php",
        data: {id: id},
        dataType: "json"
    })
            .done(produtoCarregado)
            .fail(produtoFalha)
            .always(produtoAlways)
    ;
}

*/