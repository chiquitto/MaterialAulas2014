var nomeUsuario;
var sobrenomeUsuario;

var pegarNome = function () {
  nomeUsuario = window.prompt('Qual seu nome?');
  sobrenomeUsuario = window.prompt('Qual seu sobrenome?');
}

var mostrarNome = function(){
  var inputNome = document.getElementById('fnome');
  
  inputNome.value = nomeUsuario;
  inputNome.disabled = true;
  
  var inputNome2 = document.getElementById('fnome2');
  inputNome2.value = sobrenomeUsuario;
}

pegarNome();

//window.alert('Carregando...');
window.onload = function() {
  //window.alert('HTML carregado');
  
  mostrarNome();
  
  var f = document.getElementById('fform');
  f.onsubmit = salvar;
}

function salvar(evento) {
  var email1 = document.getElementById('femail');
  var email2 = document.getElementById('femail2');
  
  if (email1.value != email2.value) {
    email1.style.backgroundColor = '#FF0000';
    email2.style.backgroundColor = 'rgb(255,0,0)';
    
    window.alert('Os 2 emails devem ser iguais.');
    evento.preventDefault();
    return false;
  }
  
}





