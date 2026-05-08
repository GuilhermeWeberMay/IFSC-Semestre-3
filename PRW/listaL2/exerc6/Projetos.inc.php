<?php
class Projetos
{
 public $id;
 public $orcamento;
 public $dataInicio;
 public $horasExecucao;

 function receberDados($conexao)
 {
  $this->id             = trim($conexao->escape_string($_POST['id']));
  $this->orcamento      = trim($conexao->escape_string($_POST['orcamento']));
  $this->dataInicio    = trim($conexao->escape_string($_POST['data_inicio']));
  $this->horasExecucao = trim($conexao->escape_string($_POST['horas_execucao']));
 }


 function create($conexao, $nomeTabela)
 {
  $sql = "INSERT INTO $nomeTabela(id, orcamento, data_inicio, horas_execucao)
   values ('$this->id', $this->orcamento, '$this->dataInicio', $this->horasExecucao);";
  $conexao->query($sql) or die($conexao->error);
 }

 function read($conexao, $nomeTabela)
 {
  echo "<table class='w3-table w3-bordered w3-border w3-centered'  > 
         <caption class='w3-border w3-xlarge w3-margin-top'> Dados dos projetos cadastrados </caption>
         <tr>
          <th>ID</th>
          <th>Orcamento</th>
          <th>Data de Início</th>
          <th>Horas de Execução</th>
         </tr>";

  $sql = "SELECT * FROM $nomeTabela ORDER BY id ASC";

  $resultado = $conexao->query($sql) or die($conexao->error);

  while ($vetorRegistro = $resultado->fetch_array()) {
   // Para evitarmos o ataque do tipo XSS, usamos o comando de sanitização a seguir
   $id      = htmlentities($vetorRegistro[0], ENT_QUOTES, 'UTF-8');

   $orcamento = htmlentities($vetorRegistro[1], ENT_QUOTES, 'UTF-8');
   $orcamentoFormatado = number_format($orcamento, 2, ',', '.');

   $dataInicio = htmlentities($vetorRegistro[2], ENT_QUOTES, 'UTF-8');

   $vetorData = explode('-', $dataInicio);
   $dataFormatada = $vetorData[2] . '/' . $vetorData[1] . '/' . $vetorData[0];

   $horasExecucao = htmlentities($vetorRegistro[3], ENT_QUOTES, 'UTF-8');

   echo "<tr>
          <td>$id</td>
          <td>R$$orcamentoFormatado</td>
          <td>$dataFormatada</td>
          <td>$horasExecucao h</td>
         </tr>";
  }
  echo "</table>";
 }

 function readDataInicio($conexao, $nomeTabela)
 {
  $sql = "SELECT * FROM $nomeTabela WHERE data_inicio > '2020-01-01';";

  $resultado = $conexao->query($sql) or die($conexao->error);

  if ($resultado->num_rows > 0) {
   echo "<div id='resultados' class='w3-container'>";
   echo "
          <table class='w3-table w3-bordered w3-border w3-centered'>
           <caption class='w3-border w3-xlarge w3-margin-top'> Dados dos projetos cadastrados </caption>
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
    $orcamentoFormatado = number_format($orcamento, 2, ',', '.');
    $dataInicio = htmlentities($vetorRegistro[2], ENT_QUOTES, 'UTF-8');
    $vetorData = explode('-', $dataInicio);
    $dataFormatada = $vetorData[2] . '/' . $vetorData[1] . '/' . $vetorData[0];
    $horasExecucao = htmlentities($vetorRegistro[3], ENT_QUOTES, 'UTF-8');

    echo "<tr>
           <td>$id</td>
           <td>R$$orcamentoFormatado</td>
           <td>$dataFormatada</td>
           <td>$horasExecucao h</td>
          </tr>";
   }
   echo "</table>";
   echo "</div>";
  } else {
   echo "<div id='resultado'>";
   echo " <p> Não existem projetos com data de início posterior a 01/01/2020. </p> ";
   echo "</div>";
  }
 }

 function delete($conexao, $nomeTabela)
 {
  $sql = "DELETE FROM $nomeTabela WHERE horas_execucao < 100 AND orcamento < 1000;";
  $conexao->query($sql) or die($conexao->error);

  $linhasExcluidas = $conexao->affected_rows;

  if ($linhasExcluidas > 0) {
   echo "<div class='w3-container'>";
   echo " <p id='excluidos'> $linhasExcluidas projeto(s) excluído(s) com sucesso! </p>";
   echo "</div>";
  } else {
   echo "<div id='resultados' class='w3-container'>";
   echo " <p> Não foi possível excluir os projetos. Verifique se existem projetos com horas de execução menores que 100 e orçamento menor que R$1000. </p>";
   echo "</div>";
  }
 }
}
