var frutas = new Array();

frutas['laranja'] = 5;
frutas['abacate'] = 8;

var i;
for ( i in frutas ) {
  window.alert( 'O preço do(a) ' + i + ' é R$' + frutas[i] );
}
