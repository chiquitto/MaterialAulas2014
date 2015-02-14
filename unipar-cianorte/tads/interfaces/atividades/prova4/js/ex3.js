var i=0;
var dados = [];
var modelo = 'Olá {{nome}}, você tem {{idade}} anos';
var nome = 'José da Silva';
var idade = 30;
do {
  dados[i] = i+1;
  i++;
} while (i<=5);

window.alert(dados);

// Resposta
var i;
for (i = 0; i < dados.length; i++) {
  if ( dados[i] % 2 == 1 ) {
    dados[i] = dados[i] * 3;
  }
}

window.alert(dados);