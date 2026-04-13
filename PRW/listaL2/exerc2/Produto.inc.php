<?php
// Agora para finalizarmos a segunda parte da aplicação envolvendo banco de dados, vamos criar a classe Alunos. Esta classe conterá métodos e propriedades necessários ao PHP para representarmos no MySQL, cada aluno sendo cadastrado. Esta classe será responsavél por implementar cada operação solicitada no exercício.
class Produto
{
 public $id, $preco, $estoque, $classificacao, $descricao;

 // Vamos então implemenar o método que recebe os dados do formulário e os atribui as propriedades do objeto aluno.
 function receberDadosForm($conexao)
 {
  // CUIDADO COM ESTA OPERAÇÃO: se não condificada corretamente, há a possibilidade de execução do atacaque conhecido como injeção de SQL.
  $this->id            = trim($conexao->escape_string($_POST['id']));
  $this->preco         = trim($conexao->escape_string($_POST['preco']));
  $this->estoque       = trim($conexao->escape_string($_POST['estoque']));
  $this->classificacao = trim($conexao->escape_string($_POST['classificacao']));
  $this->descricao     = trim($conexao->escape_string($_POST['descricao']));
 }

 function create($conexao, $nomeTabela)
 {
  $sql = "INSERT INTO $nomeTabela (id, preco, estoque, classificacao, descricao) VALUES ('$this->id', $this->preco, $this->estoque, '$this->classificacao', '$this->descricao')";
  $conexao->query($sql) or die($conexao->error);
 }

 // Método para percorrer o banco de dados e tabular os dados de cada aluno na página web 
 function tabularDados($conexao, $nomeTabela)
 {
  echo "<table>
         <caption> Dados dos produtos cadastrados </caption>
         <tr>
          <th>ID</th>
          <th>Preço</th>
          <th>Estoque</th>
          <th>Classificação</th>
          <th>Descrição</th>
         </tr>";

  // Vamos criar uma estrutura que permita que o código em PHP percorra todo o conjunto de dados enviado pelo banco na consulta SELECT. Esta estrutura pode ser comparada a uma matriz e permite o PHP receba os dados de cada aluno e mostre-os no formato de tabela na página web.
  $sql = "SELECT * FROM $nomeTabela where classificacao = 'Perecível' order by estoque desc";

  // Recebemos o resultado do SELECT e o colocamos na "matriz" $resultado.
  $resultado = $conexao->query($sql) or die($conexao->error);

  while ($vetorRegistro = $resultado->fetch_array()) {
   // Para evitarmos o ataque do tipo XSS, usamos o comando de sanitização a seguir
   $id = htmlentities($vetorRegistro[0], ENT_QUOTES, 'UTF-8');
   $preco = htmlentities($vetorRegistro[1], ENT_QUOTES, 'UTF-8');
   $estoque = htmlentities($vetorRegistro[2], ENT_QUOTES, 'UTF-8');
   $classificacao = htmlentities($vetorRegistro[3], ENT_QUOTES, 'UTF-8');
   $descricao = htmlentities($vetorRegistro[4], ENT_QUOTES, 'UTF-8');

   echo "<tr>
  <td>$id</td>
  <td>$preco</td>
  <td>$estoque</td>
  <td>$classificacao</td>
  <td>$descricao</td>
  </tr>";
  }
  echo "</table>";
 }

 function mostrarDescricaoMenorEstoque($conexao, $nomeTabela)
 {
  $sql = "SELECT descricao FROM $nomeTabela WHERE estoque = (SELECT MIN(estoque) FROM $nomeTabela)";
  $resultado = $conexao->query($sql) or die($conexao->error);
  $vetorRegistro = $resultado->fetch_array();
  echo "<p> Descrição do produto com menor estoque: " . htmlentities($vetorRegistro[0], ENT_QUOTES, 'UTF-8') . "</p>";
 }

 function faturamentoTotalNaoPereciveis($conexao, $nomeTabela)
 {
  $sql = "SELECT SUM(preco * estoque) FROM $nomeTabela WHERE classificacao = 'Não-Perecível'";
  $resultado = $conexao->query($sql) or die($conexao->error);
  $vetorRegistro = $resultado->fetch_array();
  echo "<p> Faturamento total dos produtos não perecíveis: R$ " . htmlentities($vetorRegistro[0], ENT_QUOTES, 'UTF-8') . "</p>";
 }
}
