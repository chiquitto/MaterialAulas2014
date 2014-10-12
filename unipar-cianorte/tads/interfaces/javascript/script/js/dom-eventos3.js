var par = document.getElementById('paragrafo');

par.onclick = function() {
  window.alert('Click');
}

par.onmouseover = function() {
  window.alert('Passou o mouse');
}

par.onmouseout = function() {
  window.alert('Tirou o mouse');
}
