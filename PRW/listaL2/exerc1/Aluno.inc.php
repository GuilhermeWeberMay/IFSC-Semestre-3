<?php
// Agora para finalizarmos a segunda parte da aplicação envolvendo banco de dados, vamos criar a classe Alunos. Esta classe conterá métodos e propriedades necessários ao PHP para representarmos no MySQL, cada aluno sendo cadastrado. Esta classe será responsavél por implementar cada operação solicitada no exercício.
class Aluno
{
 public $matricula, $nome, $mediaFinal;

 // Vamos então implemenar o método que recebe os dados do formulário e os atribui as propriedades do objeto aluno.
 function receberDadosForm($conexao)
 {
  // CUIDADO COM ESTA OPERAÇÃO: se não condificada corretamente, há a possibilidade de execução do atacaque conhecido como injeção de SQL.
  $this->matricula = trim($conexao->escape_string($_POST['matricula']));
  $this->nome = trim($conexao->escape_string($_POST['nome']));
  $this->mediaFinal = trim($conexao->escape_string($_POST['media']));
 }

 function create($conexao, $nomeTabela)
 {
  $sql = "INSERT INTO $nomeTabela (matricula, nome, media) VALUES ('$this->matricula', '$this->nome',$this->mediaFinal)";
  $conexao->query($sql) or die($conexao->error);
 }

 // Método para percorrer o banco de dados e tabular os dados de cada aluno na página web 
 function tabularDados($conexao, $nomeTabela)
 {
  echo "<table>
         <caption> Dados dos alunos cadastrados </caption>
         <tr>
          <th>Matrícula</th>
          <th>Nome</th>
          <th>Média final</th>
         </tr>";

  // Vamos criar uma estrutura que permita que o código em PHP percorra todo o conjunto de dados enviado pelo banco na consulta SELECT. Esta estrutura pode ser comparada a uma matriz e permite o PHP receba os dados de cada aluno e mostre-os no formato de tabela na página web.
  $sql = "SELECT * FROM $nomeTabela";

  // Recebemos o resultado do SELECT e o colocamos na "matriz" $resultado.
  $resultado = $conexao->query($sql) or die($conexao->error);

  while ($vetorRegistro = $resultado->fetch_array()) {
   // Para evitarmos o ataque do tipo XSS, usamos o comando de sanitização a seguir
   $matricula = htmlentities($vetorRegistro[0], ENT_QUOTES, 'UTF-8');
   $nome = htmlentities($vetorRegistro[1], ENT_QUOTES, 'UTF-8');
   $media = htmlentities($vetorRegistro[2], ENT_QUOTES, 'UTF-8');

   echo "<tr>
  <td>$matricula</td>
  <td>$nome</td>
  <td>$media</td>
  </tr>";
  }
  echo "</table>";
 }

 // Vamos implementar o método que mostra o número de alunos aprovados na UC.
 function contarAprovados($conexao, $nomeTabela)
 {
  $sql = "SELECT COUNT(*) FROM $nomeTabela WHERE media >= 6";
  $resultado = $conexao->query($sql) or die($conexao->error);
  $vetorRegistro = $resultado->fetch_array();
  echo "<p> Número de alunos aprovados: " . htmlentities($vetorRegistro[0], ENT_QUOTES, 'UTF-8') . "</p>";
 }
}
