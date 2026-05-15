<?php
class Veiculo
{
 public $fabricante, $modelo, $placa, $cor, $ano;

 function receberDados($conexao)
 {
  $this->fabricante = trim($conexao->escape_string($_POST["fabricante"]));
  $this->modelo     = trim($conexao->escape_string($_POST["modelo"]));
  $this->placa      = trim($conexao->escape_string($_POST["placa"]));
  $this->cor        = trim($conexao->escape_string($_POST["cor"]));
  $this->ano        = trim($conexao->escape_string($_POST["ano"]));
 }
 function create($conexao, $nomeDaTabela)
 {
  $sql = "INSERT $nomeDaTabela VALUES(
            null,
            '$this->fabricante',
            '$this->modelo',
            '$this->placa',
            '$this->cor',
            '$this->ano')";

  $conexao->query($sql) or die($conexao->error);
 }
}
