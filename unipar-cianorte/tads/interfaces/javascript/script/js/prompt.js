var msg = 'Quantos anos você tem?';

var r = window.prompt(msg, '18 anos');

if (r == null) {
    window.alert('Você deve digitar sua idade');
}
else {
    window.alert(r);
}

