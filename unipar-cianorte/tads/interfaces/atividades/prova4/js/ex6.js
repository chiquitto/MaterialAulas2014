/*
Dado uma página HTML com um input (#nome) e um button (#botao), criar um script que

quando #botao receber um clique,

o valor de #nome seja verificado.

Se o valor for vazio pintar as bordas de #nome com a cor vermelha,
caso contrário de verde.
*/

window.onload = function() {
  
  var btn = document.getElementById('botao');
  
  btn.onclick = function() {
    var n = document.getElementById('nome');
    
    if (n.value == '') {
      n.style.borderColor = 'red';
    }
    else {
      n.style.borderColor = 'green';
    }
  }
  
}














