<!DOCTYPE html>
<html lang="pt-BR">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
 <link rel="stylesheet" href="style.css">
 <title> Exercício 6 </title>
</head>

<body>
 <div class="w3-bar titulo">
  <h1 class="w3-center"> PHP + MYSQL - Exercício 6 </h1>
  <form action="index.php" method="get">
   <button class="w3-btn" onclick="mostraFormulario()" type="button"> Cadastrar projeto </button>
   <button name="listar" class="w3-btn"> Listar todos </button>
   <button name="posteriores" class="w3-btn"> Listar posteriores </button>
   <button name="excluir" class="w3-btn"> Excluir projetos </button>
  </form>
 </div>

 <form action="index.php" method="post" id="formulario">
  <div id="cadastro" class="w3-container w3-card-4 w3-light-grey w3-margin w3-padding">
   <h2> Cadastrar um novo projeto </h2>
   <label for="id"> ID: </label>
   <input class="w3-input w3-border" type="number" name="id" id="id" required>

   <label for="orcamento"> Orçamento: </label>
   <input class="w3-input w3-border" type="number" step="0.01" name="orcamento" id="orcamento" required>

   <label for="data_inicio"> Data de início: </label>
   <input class="w3-input w3-border" type="date" name="data_inicio" id="data_inicio" required>

   <label for="horas_execucao"> Estimativa de horas: </label>
   <input class="w3-input w3-border" type="number" name="horas_execucao" id="horas_execucao" required>

   <button class="w3-button w3-margin-top cadastrar w3-block" type="submit" name="cadastrar"> Cadastrar </button>
  </div>
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
  echo "<div id='resultados' class='w3-container'>";
  $projeto->read($conexao, $banco->nomeTabela);
  echo "</div>";
 }
 if (isset($_GET['posteriores'])) {
  $projeto->readDataInicio($conexao, $banco->nomeTabela);
 }
 if (isset($_GET['excluir'])) {
  $projeto->delete($conexao, $banco->nomeTabela);
 }
 ?>
 <script src="main.js"></script>
</body>

</html>