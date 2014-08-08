// window.onload = paginaCarregada;
$(document).ready(paginaCarregada);

function paginaCarregada() {
    //$('#produtosSelecao').change(produtoSelecionado);
    prepararCombobox();
    prepararAdicionar();
}

function paginaFechada() {
    
}

function prepararAdicionar(){
    //$('#botao').click(produtoAdicionar);
    $('#fInfo').submit(produtoAdicionar);

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

function produtoAdicionar(evento){
    evento.preventDefault(); //cancela o evento de submit do formulário
    var codProduto = $('#produtosSelecao').val();
    var qtd = $('#fInfoQtd').val();

    $.ajax({
        url: 'ajax/addItem.php',
        type: 'post',
        data: {codProduto: codProduto, qtd: qtd},
        dataType: 'json'
    })

        .done(produtoAdicionarDone)
        .fail(produtoAdicionarFail)
    ;


}

function produtoAdicionarDone(retorno){
    if(retorno.codigo == 0){
        alert("Adicionou");
        return;
    }
 
    alert(retorno.codigo + " - " + retorno.mensagem);
}

function produtoAdicionarFail(){
    alert("Não Adicionou");
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