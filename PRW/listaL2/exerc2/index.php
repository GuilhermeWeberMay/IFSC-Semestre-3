<!DOCTYPE html>
<html lang="pt-BR">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos de Banco de Dados com PHP </title>
 <link rel="stylesheet" href="style.css">
</head>

<body>
 <h1> PHP + MYSQL - Exercício 2 </h1>
 <fieldset>
  <legend> Supermercado GWM - Cadastro de produtos </legend>
  <form action="index.php" method="post">

   <label for="id"> ID:</label>
   <input type="text" id="id" name="id" autofocus><br>

   <label for="preco">Preço (un):</label>
   <input type="number" id="preco" name="preco" min="0" step="0.01"><br>

   <label for="estoque"> Estoque:</label>
   <input type="number" id="estoque" name="estoque" min="0"><br>

   <label for="classificacao"> Classificação: </label> <br>
   <input type="radio" name="classificacao" id="classificacao" value="Perecível"><label for="classificacao">Perecível</label><br>
   <input type="radio" name="classificacao" id="classificacao" value="Não-Perecível"><label for="classificacao">Não Perecível</label><br><br>

   <label for="descricao"> Descrição: </label>
   <textarea name="descricao" id="descricao" maxlength="500"></textarea> <br><br>

   <div>
    <label for="operacoes"> Escolha uma operação: </label>
    <select name="operacoes">
     <option value="cadastrar"> Cadastrar produto</option>
     <option value="mostrar"> Mostrar dados perecíveis</option>
     <option value="descricao"> Mostrar descrição menor quantidade </option>
     <option value="calcular"> Faturamento total não pereciveis </option>
     <option value="total"> Mostrar o total de itens no estoque</option>
    </select>
    <button type="submit" name="botao">Executar</button>
   </div>

  </form>
 </fieldset>

 <?php
 require 'bda.inc.php';
 require 'Produto.inc.php';

 // Vamos usar o método construtor para criar um objeto banco
 $banco = new BancoDeDados('localhost', 'root', '', 'db_escola', 'produtos');

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

 // Vamos criar o objeto aluno, a partir do construtor padrão da classe Aluno.
 $produto = new Produto();

 // Vamos fazer o PHP descobrir qual botão do formulário foi clicado
 if (isset($_POST['botao'])) {
  // Vamos descrobrir qual option do select foi escolhida
  $operacao = $_POST['operacoes'];

  switch ($operacao) {
   case 'cadastrar':
    $produto->receberDadosForm($conexao);
    $produto->create($conexao, $banco->nomeTabela);
    echo "<p> Produto cadastrado com sucesso! </p>";
    break;
   case 'mostrar':
    $produto->tabularDados($conexao, $banco->nomeTabela);
    break;
   case 'descricao':
    $produto->mostrarDescricaoMenorEstoque($conexao, $banco->nomeTabela);
    break;
   case 'calcular':
    $produto->faturamentoTotalNaoPereciveis($conexao, $banco->nomeTabela);
    break;
   case 'total':
     $produto->totalItensEstoque($conexao, $banco->nomeTabela);
     break;
  }
 }
 //Encerrar a conexão do PHP com o MySQL
 $banco->fecharConexao($conexao);

 ?>
</body>

</html>