function imc ( altura, peso ) {
    // peso / altura ao quadrado
    var altura2 = altura * altura;
    var imc = peso / altura2;
    return imc;
}

var a = 1.75;
var p = 115;

var i = imc( a, p );

window.alert( i );
