var n = 250;

if ( n < 50 ) {
	window.alert('Numero é menor que 50');
}
else {
	if ( n < 100 ) {
		window.alert('Numero é menor que 100');
	}
	else {
		if ( n < 200 ) {
			window.alert('Numero é menor que 200');
		}
		else {
			window.alert('Numero é maior/igual a 200');
		}
	}
}

if ( n < 50 ) {
	window.alert('Numero é menor que 50');
}
else if ( n < 100 ) {
	window.alert('Numero é menor que 100');
}
else if ( n < 200 ) {
	window.alert('Numero é menor que 200');
}
else {
	window.alert('Numero é maior/igual a 200');
}
