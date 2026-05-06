<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
 <link rel="stylesheet" href="style.css">
 <title> Exercício 6 </title>
</head>

<body>
 <div class="w3-bar w3-green">
  <h2 class="w3-center"> PHP + MYSQL - Exercício 5 </h2>
  <div class="w3-bar-item w3-large" onclick="teste1()" style="cursor: pointer;"> Cadastrar </div>
  <div class="w3-bar-item w3-large" onclick="teste2()" style="cursor: pointer;"> Atualizar </div>
  <div class="w3-bar-item w3-large" onclick="teste3()" style="cursor: pointer;"> Excluir </div>
  <div class="w3-bar-item w3-large" onclick="teste4()" style="cursor: pointer;"> Buscar </div>
 </div>

 <form action="index.php" method="post">
  <div id="cadastro" class="w3-container w3-card-4 w3-light-grey w3-margin w3-padding">
   <h2> Cadastrar um novo projeto </h2>
   <label for="id"> ID do projeto: </label>
   <input class="w3-input w3-border" type="text" name="id" id="id" required>

   <label for="orcamento"> Orçamento do projeto: </label>
   <input class="w3-input w3-border" type="number" step="0.01" name="orcamento" id="orcamento" required>

   <label for="data_inicio"> Data de início do projeto: </label>
   <input class="w3-input w3-border" type="date" name="data_inicio" id="data_inicio" required>

   <label for="horas_execucao"> Horas de execução do projeto: </label>
   <input class="w3-input w3-border" type="number" name="horas_execucao" id="horas_execucao" required>

   <button class="w3-button w3-green w3-margin-top" type="submit" name="cadastrar"> Cadastrar </button>
  </div>
 </form>

 <form action="index.php">
  <button name="listar"> Listar proejtos </button>
 </form>

 <form action="index.php">
  <button name="posteriores"> Projetos posteriores </button>
 </form>

 <form action="index.php">
  <button name="excluir"> Excluir projetos menores que 100 horas e R$1000 de orçamento </button>
 </form>

 <?php
 include_once "Projetos.inc.php";
 include_once "bda.inc.php";

 $banco = new BancoDeDados('localhost', 'root', '', 'db_escola', 'projetos');
 $conexao = $banco->conectar();
 $banco->criarBanco($conexao);
 $banco->abrirBanco($conexao);
 $banco->criarTabela($conexao);
 $banco->definirCharset($conexao);
 $projeto = new Projetos();

 if (isset($_POST['cadastrar'])) {
  $projeto->receberDados($conexao);
  $projeto->create($conexao, $banco->nomeTabela);
  echo "<p> Projeto cadastrado com sucesso! </p>";
 }
 if (isset($_GET['listar'])) {
  $projeto->read($conexao, $banco->nomeTabela);
 }
 if (isset($_GET['posteriores'])) {
  $projeto->readDataInicio($conexao, $banco->nomeTabela);
 }
 if (isset($_GET['excluir'])) {
  $projeto->delete($conexao, $banco->nomeTabela);
 }
?>
</body>

</html>