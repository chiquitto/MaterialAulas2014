function mensagem() {
  window.alert('Ação do usuario');
}

var par = document.getElementById('paragrafo');

par.onclick = mensagem;

par.onmouseover = mensagem;

par.onmouseout = mensagem;
