let objBotao = document.getElementById("botao");
function validar(){
    let nome = document.getElementById("nome").value;
    let email = document.getElementById("email").value;
    if(nome == ''){
        alert("Preencha todos os campos!");
    } else {
        alert("Dados enviados com sucesso!");
    } 
}
objBotao.addEventListener("submit", validar);