var vazio = '&nbsp;';
var foto = './lib/img/candidatos/{numero}.png';

// V=Vereador P=Prefeito
var votacaoCargo;

var votacaoNumero;

/*
http://www.icons101.com/icon/id_60221/setid_928/Pokemon_by_HEKTakun/202_Wobbuffet
PMB = Partido dos Monstros de Bolso
PSM = Partido do Super Mario
PSA = Partido do Sonic & Amigos
*/

var candidatos = [];
candidatos['prefeito'] = [];
candidatos['vereador'] = [];

candidatos['prefeito'][0] = ['88', 'Paper Mario', 'PSM'];
candidatos['prefeito'][1] = ['99', 'Sonic', 'PSA'];
candidatos['prefeito'][2] = ['77', 'Pikachu', 'PMB'];

candidatos['vereador'][0] = ['88001', 'Goomba', 'PSM'];
candidatos['vereador'][1] = ['88014', '????', 'PSM'];
candidatos['vereador'][2] = ['88123', 'Flower', 'PSM'];
candidatos['vereador'][3] = ['88456', 'Cogumelo', 'PSM'];
candidatos['vereador'][4] = ['88666', 'Boo', 'PSM'];
candidatos['vereador'][5] = ['88999', 'Florzinha', 'PSM'];

candidatos['vereador'][6] = ['99555', 'Tails', 'PSA'];
candidatos['vereador'][7] = ['99111', 'Emerl', 'PSA'];
candidatos['vereador'][8] = ['99854', 'Rouge', 'PSA'];
candidatos['vereador'][9] = ['99765', 'Dr. Eggman', 'PSA'];

candidatos['vereador'][10] = ['77150', 'Mewtwo', 'PMB'];
candidatos['vereador'][11] = ['77202', 'Wobbuffet', 'PMB'];
candidatos['vereador'][12] = ['77249', 'Lugia', 'PMB'];
candidatos['vereador'][13] = ['77250', 'Ho-oh', 'PMB'];

window.onload = iniciar;

function iniciar() {
  document.getElementById('btBranco').onclick = btBrancoClique;
  
  document.getElementById('btCorrige').onclick = btCorrigeClique;
  
  document.getElementById('btConfirma').onclick = btConfirmaClique;
  
  /*
  for(i = 0; i <= 9; i++) {
    document.getElementById('btNumero' + i).onclick = btNumericoClique;
  }
  */
  
  var botoes = document.querySelectorAll('#btNumero button');
  var i;
  for (i = 0; i < botoes.length; i++) {
    botoes[i].onclick = btNumericoClique;
  }
  
  votacaoIniciar();
}

function btNumericoClique() {
  votacaoAdicionaNumero(this.innerHTML);
  telaAdicionaNumero();
  
  if ( votacaoVerificaSlots() ) {
    var candidato = votacaoPesquisaCandidato();
	
	if ( candidato == null ) {
	  window.alert('O candidato não existe');
	  btCorrigeClique();
	  return false;
	}
	
	telaTrocarNome( candidato[1] );
	telaTrocarPartido( candidato[2] );
	telaTrocarFoto( candidato[0] );
  }
}

function btBrancoClique() {
  window.alert('Você esta votando em branco');
}

function btCorrigeClique() {
  if ( votacaoCargo == 'V' ) {
    votacaoVereador();
  }
  else {
    votacaoPrefeito();
  }
}

function btConfirmaClique() {
  if ( votacaoVerificaSlots() ) {
    switch (votacaoCargo) {
	  case 'V':
	    votacaoPrefeito();
		break;
	  
	  case 'P':
	    votacaoFim();
		
	    break;
	}
  }
}

function telaPrepararVereador() {
  telaTrocarCargo();
  telaPrepararNumeros();
  telaOcultarNome();
  telaOcultarPartido();
  telaOcultarFoto();
}

function telaPrepararPrefeito() {
  telaTrocarCargo();
  telaPrepararNumeros();
  telaOcultarNome();
  telaOcultarPartido();
  telaOcultarFoto();
}

function telaMostrar() {
  document.getElementById('telaVoto')
  .style.display = 'block';
}

function telaOcultar() {
  document.getElementById('telaVoto')
  .style.display = 'none';
}

function telaTrocarNome(nome) {
  var e = document.querySelector('#telaNome strong');
  e.innerHTML = nome;
  
  document.getElementById('telaNome')
  .style.display = 'block';
}

function telaOcultarNome() {
  document.getElementById('telaNome')
  .style.display = 'none';
}

function telaTrocarPartido(partido) {
  document.querySelector('#telaPartido strong')
  .innerHTML = partido;
  
  document.getElementById('telaPartido')
  .style.display = 'block';
}

function telaOcultarPartido() {
  document.getElementById('telaPartido')
  .style.display = 'none';
}

function telaTrocarFoto(numero) {
  var img = document.querySelector('#telaFoto img');
  var imgSrc = foto.replace('{numero}', numero);
  
  img.src = imgSrc;
  telaMostrarFoto();
}

function telaMostrarFoto() {
  document.getElementById('telaFoto')
  .style.display = 'block';
}

function telaOcultarFoto() {
  document.getElementById('telaFoto')
  .style.display = 'none';
}

function telaTrocarCargo() {
  var cargo;
  if (votacaoCargo == 'V') {
    cargo = 'Vereador';
  }
  else {
    cargo = 'Prefeito';
  }
  
  document.querySelector('#telaVoto h1')
  .innerHTML = cargo;
}

function telaAdicionaNumero() {
  var i = votacaoNumero.length - 1;
  var numero = votacaoNumero[i];
  
  var slot = document.getElementById('slot' + i);
  slot.innerHTML = numero;
}

function telaDesenharNumeros() {
  
}

function telaPrepararNumeros() {
  var qtd;
  if (votacaoCargo == 'V') {
    qtd = 5;
  }
  else {
    qtd = 2;
  }
  
  var ultimoSlot = qtd - 1;
  
  var slots = document
  .querySelectorAll('#telaNumero span');
  
  var i;
  for ( i = 0; i < slots.length; i++ ) {
    if ( i <= ultimoSlot ) {
      slots[i].style.display = 'inline';
    }
    else {
      slots[i].style.display = 'none';
    }
    
    slots[i].innerHTML = vazio;
  }
}

function votacaoFim() {
  telaOcultar();
  
  document.getElementById('telaFim')
  .style.display = 'block';
  
  setTimeout(votacaoIniciar, 2000);
}

function votacaoIniciar() {
  document.getElementById('telaFim')
  .style.display = 'none';
  
  votacaoVereador();
}

function votacaoVereador() {
  votacaoCargo = 'V';
  votacaoNumero = new Array();
  
  telaPrepararVereador();
  telaMostrar();
}

function votacaoPrefeito() {
  votacaoCargo = 'P';
  votacaoNumero = new Array();
  
  telaPrepararPrefeito();
  telaMostrar();
}

function votacaoAdicionaNumero(numero) {
  var i = votacaoNumero.length;
  votacaoNumero[i] = numero;
}

function votacaoVerificaSlots() {
  var qtd;
  
  if (votacaoCargo == 'V') {
    qtd = 5;
  }
  else {
    qtd = 2;
  }
  
  return (votacaoNumero.length == qtd);
}

function votacaoPesquisaCandidato() {
  var cargo;
  
  if ( votacaoCargo == 'V' ) {
    cargo = 'vereador';
  }
  else {
    cargo = 'prefeito';
  }
  
  var n = votacaoNumero.join('');
  var pesquisa = candidatos[cargo];
  
  var i;
  for( i = 0; i < pesquisa.length; i++ ) {
    if ( pesquisa[i][0] == n) {
      return pesquisa[i];
    }
  }
  
  return null;
}





