var i=0;
var dados = [];
var modelo = 'Olá {{nome}}, você tem {{idade}} anos';
var nome = 'José da Silva';
var idade = 30;
do {
  dados[i] = i+1;
  i++;
} while (i<=5);

// Resposta
//modelo = modelo.replace('o', '1');
modelo = modelo.replace('{{nome}}', nome);
modelo = modelo.replace('{{idade}}', idade);

window.alert(modelo);