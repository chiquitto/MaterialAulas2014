var nomeUsuario;

var pegarNome = function () {
  nomeUsuario = window.prompt('Qual seu nome?');
}

var mostrarNome = function(){
  var inputNome = document.getElementById('fnome');
  inputNome.value = nomeUsuario;
}

pegarNome();

// Isto não irá funcionar
mostrarNome();