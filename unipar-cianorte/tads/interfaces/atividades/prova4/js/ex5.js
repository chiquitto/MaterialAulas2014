/*
(1,5) Dado uma página HTML com vários elementos button, criar um script que:

1. Atribua uma função que manipule o evento click de todos os elementos button da página;

2. A função que manipula os clicks dos botões deve exibir a propriedade name do botão que foi clicado.
*/

window.onload = function() {
  var btns = document.querySelectorAll('button');
  //window.alert(btns.length);

  var i;
  for ( i = 0; i < btns.length; i++ ) {
    btns[i].onclick = funcao;
  }
}

function funcao() {
  // Mostrar o name do elemento
  window.alert(this.name);
}
