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
candidatos['prefeito'][2] = ['77', 'Pikachu', 'PSM'];

candidatos['vereador'][0] = ['88001', 'Goomba', 'PSM'];
candidatos['vereador'][1] = ['88014', '????', 'PSM'];
candidatos['vereador'][2] = ['88123', 'Flower', 'PSM'];
candidatos['vereador'][3] = ['88456', 'Cogumelo', 'PSM'];
candidatos['vereador'][4] = ['88666', 'Boo', 'PSM'];
candidatos['vereador'][5] = ['88999', 'Florzinha', 'PSM'];

candidatos['vereador'][5] = ['99555', 'Tails', 'PSA'];
candidatos['vereador'][6] = ['99111', 'Emerl', 'PSA'];
candidatos['vereador'][7] = ['99854', 'Rouge', 'PSA'];
candidatos['vereador'][8] = ['99765', 'Dr. Eggman', 'PSA'];

candidatos['vereador'][9] = ['77150', 'Mewtwo', 'PMB'];
candidatos['vereador'][10] = ['77202', 'Wobbuffet', 'PMB'];
candidatos['vereador'][11] = ['77249', 'Lugia', 'PMB'];
candidatos['vereador'][12] = ['77250', 'Ho-oh', 'PMB'];

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
}

function btNumericoClique() {
  window.alert(this.innerHTML);
}

function btBrancoClique() {
  window.alert('Você esta votando em branco');
}

function btCorrigeClique() {
  window.alert('Você esta corrigindo o voto');
}

function btConfirmaClique() {
  window.alert('Confirma voto');
}

function telaPrepararVereador() {

}

function telaPrepararPrefeito() {

}

function telaMostrar() {

}

function telaOcultar() {

}

function telaTrocarNome() {

}

function telaTrocarPartido() {

}

function telaTrocarFoto() {

}

function telaMostrarFoto() {

}

function telaOcultarFoto() {

}

function telaTrocarCargo() {

}

function telaAdicionaNumero() {

}

function telaDesenharNumeros() {

}

function votacaoFim() {

}

function votacaoIniciar() {

}



