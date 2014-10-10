var pessoas = new Array();

pessoas['x1'] = 30;
pessoas['x2'] = 45;
pessoas['y5'] = 60;

var i;
for ( i in pessoas ) {
  window.alert( i );
  window.alert( pessoas[i] );
}