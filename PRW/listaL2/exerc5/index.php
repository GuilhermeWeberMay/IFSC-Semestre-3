<!DOCTYPE html>
<html lang="pt-BR">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos de Banco de Dados com PHP </title>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
 <link rel="stylesheet" href="style.css">
</head>

<body>

 <div class="w3-bar w3-green">
  <h2 class="w3-center"> PHP + MYSQL - Exercício 5 </h2>
  <div class="w3-bar-item w3-large" onclick="teste1()" style="cursor: pointer;"> Cadastrar </div>
  <div class="w3-bar-item w3-large" onclick="teste2()" style="cursor: pointer;"> Atualizar </div>
  <div class="w3-bar-item w3-large" onclick="teste3()" style="cursor: pointer;"> Excluir </div>
  <div class="w3-bar-item w3-large" onclick="teste4()" style="cursor: pointer;"> Buscar </div>
 </div>

 <div class="w3-container">
  <div id="cadastrar">
   <h4>Livraria GWM - Cadastro de Livros</h4>

   <form action="index.php" method="post" class="w3-container">
    <label for="isbn">ISBN:</label>
    <input type="text" id="isbn" name="isbn" class="w3-input"> <br>

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" class="w3-input"> <br>

    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor" class="w3-input"> <br>

    <label for="preco">Preço:</label>
    <input type="number" id="preco" name="preco" min="0" step="0.01" class="w3-input"> <br>

    <label for="data">Data de lançamento:</label>
    <input type="date" id="data" name="data" class="w3-input"> <br>

    <button type="submit" name="cadastrar-livro" class="w3-button w3-block w3-green"> Cadastrar livro </button>

   </form>
  </div>

  <div id="atualizar">
   <h4>Livraria GWM - Atualização de Livros</h4>

   <form action="index.php" method="post" class="w3-container">
    <label for="isbn">ISBN:</label>
    <input type="text" id="isbn" name="isbn-atualizado" class="w3-input"> <br>

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo-atualizado" class="w3-input"> <br>

    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor-atualizado" class="w3-input"> <br>

    <label for="preco">Preço:</label>
    <input type="number" id="preco" name="preco-atualizado" min="0" step="0.01" class="w3-input"> <br>

    <label for="data">Data de lançamento:</label>
    <input type="date" id="data" name="data-atualizada" class="w3-input"> <br>

    <button type="submit" name="atualizar-livro" class="w3-button w3-block w3-green"> Atualizar livro </button>

   </form>
  </div>

  <div id="excluir">
   <h4>Livraria GWM - Exclusão de Livros com mais de 2 anos </h4>
   <form action="index.php" method="post">
    <button type="submit" name="excluir-livro" class="w3-button w3-block w3-green"> Excluir livro </button>
   </form>
  </div>

  <div id="buscar">
   <h4>Livraria GWM - Listagem de Livros Cadastrados </h4>
   <form action="index.php" method="post">
    <button name="buscar-livro" class="w3-button w3-block w3-green"> Buscar livros </button>
   </form>
  </div>

 </div>

 <?php
 include_once "Livro.inc.php";
 include_once "bda.inc.php";

 $banco = new BancoDeDados('localhost', 'root', '', 'db_escola', 'livros');
 $conexao = $banco->conectar();
 $banco->criarBanco($conexao);
 $banco->abrirBanco($conexao);
 $banco->criarTabela($conexao);
 $banco->definirCharset($conexao);
 $livro = new Livro();


 if (isset($_POST['cadastrar-livro'])) {
  $livro->receberDados($conexao);
  $livro->create($conexao, $banco->nomeTabela);
 }
 if (isset($_POST['atualizar-livro'])) {
  $livro->update($conexao, $banco->nomeTabela);
 }
 if (isset($_POST['excluir-livro'])) {
  $livro->delete($conexao, $banco->nomeTabela);
 }
 if (isset($_POST['buscar-livro'])) {
  echo "Botão de busca acionado!";
  $livro->read($conexao, $banco->nomeTabela);
 }

 ?>

 <script src="main.js"></script>
</body>

</html>