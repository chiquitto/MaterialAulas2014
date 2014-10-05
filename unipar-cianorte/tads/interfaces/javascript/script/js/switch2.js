var genero = '';

switch ( genero ) {
    case 'F':
        window.alert('Desenha');
        
    case 'M':
        window.alert('Joga bola');
        break;
}

if ( genero == 'F' ) {
    window.alert('Desenha');
}

if ( (genero == 'F') || (genero == 'M') ) {
    window.alert('Joga bola');
}
