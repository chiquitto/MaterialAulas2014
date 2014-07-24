// window.onload = paginaCarregada;
$(document).ready(paginaCarregada);

function paginaCarregada() {
    $('#produtosSelecao').change(produtoSelecionado);
}

function paginaFechada() {
    
}

function produtoSelecionado() {
    var id = $(this).val();
    
    $.ajax({
        data: {id: id},
        type: 'get',
        dataType: 'json',
        url: 'ajax/produto.php'
    })
            .done(produtoCarregado)
            .fail(produtoNaoEncontrado)
    ;
}

function produtoAdicionar() {
    
}

function produtoCarregado() {
    alert('Produto foi carregado');
}

function produtoNaoEncontrado() {
    alert('Produto não foi carregado');
}