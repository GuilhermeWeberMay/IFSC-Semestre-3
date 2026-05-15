function navega(destino) {
 let telas = document.getElementsByClassName('tela')
 Array.from(telas).forEach(element => {
  element.classList.remove('w3-show')
  element.classList.add('w3-hide')
 });
 document.getElementById(destino).classList.remove('w3-hide')
 document.getElementById(destino).classList.add('w3-show')
}
function respostaForms() {

 document.getElementById('home').classList.remove('w3-show');
 document.getElementById('home').classList.add('w3-hide');

 document.getElementById('formulario-cliente').classList.remove('w3-hide');
 document.getElementById('formulario-cliente').classList.add('w3-show');
}