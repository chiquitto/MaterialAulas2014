function mostrarMensagem() {
  window.alert('Mouse');
}

var p = document.getElementById('paragrafo');

p.onclick = function() {
  window.alert('Você clicou no paragrafo');
}

p.onmouseover = mostrarMensagem;

p.onmouseout = mostrarMensagem;
