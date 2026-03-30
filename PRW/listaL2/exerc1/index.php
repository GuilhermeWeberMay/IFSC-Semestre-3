<!DOCTYPE html>
<html lang="pt-BR">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos de Banco de Dados com PHP </title>
 <link rel="stylesheet" href="style.css">
</head>

<body>
 <h1> PHP + MYSQL - Exercício 1 </h1>
 <fieldset>
  <legend> Escola GWM - Cadastro de alunos </legend>
  <form action="index.php" method="post">

   <label for="matricula">Matrícula:</label>
   <input type="text" id="matricula" name="matricula" required autofocus><br>

   <label for="nome">Nome:</label>
   <input type="text" id="nome" name="nome" required><br>

   <label for="media">Média final:</label>
   <input type="number" id="media" name="media" required min="0" max="10" step="0.1"><br>

   <div>
    <button name="cadastrar" type="submit">Cadastrar</button>
    <button name="listar" type="submit">Listar todos</button>
    <button name="contar" type="submit">Mostrar aprovador</button>
   </div>

  </form>
 </fieldset>

 <?php
 // Vamos incluir os arquivos contendo as includes com a definição de classes
 require 'bda.inc.php';
 require 'Aluno.inc.php';

 // Vamos usar o método construtor para criar um objeto banco
 $banco = new BancoDeDados('localhost', 'root', '', 'db_escola', 'alunos');

 // Visualizando o conteúdo do objeto banco
 ##var_dump($banco);

 $conexao = $banco->conectar();

 // Criar o banco de dados alunos
 $banco->criarBanco($conexao);

 // Método para abrir o banco de dados
 $banco->abrirBanco($conexao);

 // Método para definir o charset do banco de dados
 $banco->definirCharset($conexao);

 // Método para criar a tabela alunos
 $banco->criarTabela($conexao);

 // Vamos fazer o PHP descobrir qual botão do formulário foi clicado
 if (isset($_POST['cadastrar'])) {
 }
 if (isset($_POST['listar'])) {
 }
 if (isset($_POST['contar'])) {
 }

 //Encerrar a conexão do PHP com o MySQL
 $banco->fecharConexao($conexao);

 ?>
</body>

</html>