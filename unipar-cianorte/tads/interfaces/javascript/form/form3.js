window.onload = iniciar;

function iniciar() {
  pegarNome();
  pegarSobreNome();
  
  document.getElementById('fform').onsubmit = validar;
}

function pegarNome() {
  var nome = window.prompt('Informe seu nome', 'Alisson');
  document.getElementById('fnome').value = nome;
}

function pegarSobreNome() {
  var snome = window.prompt('Informe seu sobrenome', 'Chiquitto');
  document.getElementById('fnome2').value = snome;
}

function validar(evento) {
  var email = document.getElementById('femail');
  var email2 = document.querySelector('#femail2');
  
  if (email.value != email2.value) {
    window.alert('Os dois emails devem ser iguais');
    evento.preventDefault();
    return ;
  }
  
  var s1 = document.getElementById('fsenha').value;
  var s2 = document.getElementById('fsenha2').value;
  
  if (s1 != s2) {
    window.alert('As senhas devem ser iguais!');
    evento.preventDefault();
    return ;
  }
  
  window.alert('Os dados estão corretos');
  //evento.preventDefault();
}











