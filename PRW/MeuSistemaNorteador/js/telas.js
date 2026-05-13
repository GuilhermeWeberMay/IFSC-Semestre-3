function trocarTelas(tela) {
    var telas = document.getElementsByClassName("tela");
    for (var i = 0; i < telas.length; i++) {
        telas[i].style.display = "none";
    }
    document.getElementById(tela).style.display = "block";
}