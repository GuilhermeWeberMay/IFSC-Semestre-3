<?php
class Projetos
{
 public $id;
 public $orcamento;
 public $data_inicio;
 public $horas_execucao;

 function receberDados($conexao)
 {
  $this->id             = trim($conexao->escape_string($_POST['id']));
  $this->orcamento      = trim($conexao->escape_string($_POST['orcamento']));
  $this->data_inicio    = trim($conexao->escape_string($_POST['data_inicio']));
  $this->horas_execucao = trim($conexao->escape_string($_POST['horas_execucao']));
 }


 function create($conexao, $nomeTabela)
 {
  $sql = "INSERT INTO $nomeTabela(id, orcamento, data_inicio, horas_execucao)
   values ('$this->id', $this->orcamento, '$this->data_inicio', $this->horas_execucao);";
  $conexao->query($sql) or die($conexao->error);
 }

 function read($conexao, $nomeTabela)
 {
  echo "<table>
         <caption> Dados dos projetos cadastrados </caption>
         <tr>
          <th>ID</th>
          <th>Orcamento</th>
          <th>Data de Início</th>
          <th>Horas de Execução</th>
         </tr>";

  $sql = "SELECT * FROM $nomeTabela";

  $resultado = $conexao->query($sql) or die($conexao->error);

  while ($vetorRegistro = $resultado->fetch_array()) {
   // Para evitarmos o ataque do tipo XSS, usamos o comando de sanitização a seguir
   $id      = htmlentities($vetorRegistro[0], ENT_QUOTES, 'UTF-8');
   $orcamento = htmlentities($vetorRegistro[1], ENT_QUOTES, 'UTF-8');
   $data_inicio = htmlentities($vetorRegistro[2], ENT_QUOTES, 'UTF-8');
   $horas_execucao = htmlentities($vetorRegistro[3], ENT_QUOTES, 'UTF-8');

   echo "<tr>
  <td>$id</td>
  <td>$orcamento</td>
  <td>$data_inicio</td>
  <td>$horas_execucao</td>
  </tr>";
  }
  echo "</table>";
 }

 function readDataInicio($conexao, $nomeTabela)
 {


  $sql = "SELECT * FROM $nomeTabela WHERE data_inicio > '2020-01-01';";

  $resultado = $conexao->query($sql) or die($conexao->error);

  if ($resultado->num_rows > 0) {
   echo "<table>
         <caption> Dados dos projetos cadastrados </caption>
         <tr>
          <th>ID</th>
          <th>Orcamento</th>
          <th>Data de Início</th>
          <th>Horas de Execução</th>
         </tr>";

   while ($vetorRegistro = $resultado->fetch_array()) {
    // Para evitarmos o ataque do tipo XSS, usamos o comando de sanitização a seguir
    $id      = htmlentities($vetorRegistro[0], ENT_QUOTES, 'UTF-8');
    $orcamento = htmlentities($vetorRegistro[1], ENT_QUOTES, 'UTF-8');
    $data_inicio = htmlentities($vetorRegistro[2], ENT_QUOTES, 'UTF-8');
    $horas_execucao = htmlentities($vetorRegistro[3], ENT_QUOTES, 'UTF-8');

    echo "<tr>
  <td>$id</td>
  <td>$orcamento</td>
  <td>$data_inicio</td>
  <td>$horas_execucao</td>
  </tr>";
   }
   echo "</table>";
  } else {
   echo "<p> Não existem projetos com data de início posterior a 01/01/2020. </p>";
  }
 }

 function delete($conexao, $nomeTabela)
 {
  $sql = "DELETE FROM $nomeTabela WHERE horas_execucao < 100 AND orcamento < 1000;";
  $conexao->query($sql) or die($conexao->error);

  $linhasExcluidas = $conexao->affected_rows;

  if ($linhasExcluidas > 0) {
   echo "<p> $linhasExcluidas projeto(s) excluído(s) com sucesso! </p>";
  } else {
   echo "<p> Não foi possível excluir os projetos. Verifique se existem projetos com horas de execução menores que 100 e orçamento menor que R$1000. </p>";
  }
 }
}
