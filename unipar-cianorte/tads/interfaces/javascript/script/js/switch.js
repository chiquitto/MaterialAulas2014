var a = 100;

if ( a == 100 ) {
    window.alert('A == 100');
}
else if ( a == 500 ) {
    window.alert('A == 500');
}
else {
    window.alert('A != 100/500');
}

switch ( a ) {
    case 100:
        window.alert('A == 100');
        break;
    case 500:
        window.alert('A == 500');
        break;
    default:
        window.alert('A != 100/500');
        break;
}


