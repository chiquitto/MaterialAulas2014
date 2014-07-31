// window.onload = paginaCarregada;
$(document).ready(paginaCarregada);

function paginaCarregada() {
    //$('#produtosSelecao').change(produtoSelecionado);
    prepararCombobox();
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

function produtoCarregado(dados) {
    console.log(dados);
    
    $('#fInfoProduto').val(dados.produto);
    $('#fInfoPreco').val(dados.preco);
    $('#fInfoEstoque').val(dados.saldo);
}

function produtoNaoEncontrado() {
    alert('Produto não foi carregado');
}

function prepararCombobox() {
    $.ajax({
        url :'ajax/produtos.php',
        type : 'get',
        dataType:'json',
        data: {}
    })
            .done(produtosCarregados)
            .fail(produtosNaoCarregados)
    ;
}

function produtosCarregados(produtos) {
    
    var html = '<option value="0">Selecione ...</option>';
    
    for(prod in produtos){
        html+='<option value="'+produtos[prod].idproduto+'">'+produtos[prod].produto+'</option>';
    }
    
    $('#produtosSelecao').html(html);
    $('#produtosSelecao').change(produtoSelecionado);
    $('#produtosSelecao').show();
    $('#idSpan').hide();
}

function produtosNaoCarregados() {
    alert('Produtos não carregados!');
}