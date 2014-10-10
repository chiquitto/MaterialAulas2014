var p = document.getElementById('paragrafo');

p.onclick = function() {
  window.alert('Você clicou no paragrafo');
}

p.onmouseover = function() {
  window.alert('Passou o mouse');
}

p.onmouseout = function() {
  window.alert('Você tirou o mouse');
}
