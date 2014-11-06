var posX = 0;
var posY = 0;
var q;
var passoX = 15;
var passoY = 10;
var somaX = 1; // 1=+ -1=-
var somaY = 1;

function init() {
  q = document.getElementById('q');
  movimentar();
}
window.onload = init;

function movimentarQ() {
  posX += (passoX * somaX);
  posY += (passoY * somaY);
  
  if ( posX >= 285 ) {
    somaX = -1;
  }
  if ( posX <= 0 ) {
    somaX = 1;
  }
  
  if ( posY >= 285 ) {
    somaY = -1;
  }
  if ( posY <= 0 ) {
    somaY = 1;
  }
  
  q.style.left = posX + 'px';
  q.style.top = posY + 'px';
}

function movimentar() {
  movimentarQ();
  //movimentarA();
  
  setTimeout(movimentar, 1000/10);
}