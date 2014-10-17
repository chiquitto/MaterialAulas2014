/**
@link http://www.receita.fazenda.gov.br/aplicacoes/atcta/cpf/funcoes.js
*/
function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;   
    //strCPF  = RetiraCaracteresInvalidos(strCPF,11);
    if (strCPF == "00000000000")
	return false;
    for (i=1; i<=9; i++)
	Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i); 
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11)) 
	Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) )
	return false;
	Soma = 0;
    for (i = 1; i <= 10; i++)
       Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11)) 
	Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) )
        return false;
    return true;
}

/**
@link http://www.fabiobmed.com.br/excelente-codigo-para-mascara-e-validacao-de-cnpj-cpf-cep-data-e-telefone/
*/
function ValidarCNPJ(ObjCnpj){
  var cnpj = ObjCnpj.value;
  var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
  var dig1= new Number;
  var dig2= new Number;

  exp = /\.|\-|\//g
  cnpj = cnpj.toString().replace( exp, "" ); 
  var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

  for(i = 0; i<valida.length; i++){
    dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);
    dig2 += cnpj.charAt(i)*valida[i];
  }
  dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
  dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

  if(((dig1*10)+dig2) != digito) {
    alert('CNPJ Invalido!');
  }
}