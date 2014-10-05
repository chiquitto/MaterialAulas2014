var msg = 'Qual a sua ultima nota';

var r = window.prompt(msg);

if ( r == null ) {
	window.alert('Digite sua nota!');
}
else if ( r == '100' ) {
	window.alert('Parabéns');
}
else {
	window.alert('Estude mais rapá');
}