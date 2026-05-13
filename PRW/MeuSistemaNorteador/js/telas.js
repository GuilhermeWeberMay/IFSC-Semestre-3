function navega(destino) {
 let telas = document.getElementsByClassName('tela')
 Array.from(telas).forEach(element => {
  element.classList.remove('w3-show')
  element.classList.add('w3-hide')
 });
 document.getElementById(destino).classList.remove('w3-hide')
 document.getElementById(destino).classList.add('w3-show')
}