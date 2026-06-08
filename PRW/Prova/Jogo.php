<?php
class Jogo
{
 public $nome, $preco, $genero;

 function receberDados($conexao)
 {
  $this->nome = trim($conexao->escape_string($_POST["nome"]));
  $this->preco = trim($conexao->escape_string($_POST["preco"]));
  $this->genero = trim($conexao->escape_string($_POST["genero"]));
 }

 function create($conexao, $nomeDaTabela)
 {
  $sql = "INSERT INTO $nomeDaTabela (nome, preco, genero) values ('$this->nome', $this->preco, '$this->genero')";
  $conexao->query($sql) or die($conexao->error);
 }

 function mediaPrecos($conexao, $nomeDaTabela)
 {
  $sql = "SELECT AVG(preco) as media_preco_jogos from $nomeDaTabela;";
  $resultado = $conexao->query($sql) or die($conexao->error);

  $media = $resultado->fetch_assoc();

  if ($media['media_preco_jogos'] != null) {

   echo "<div id='resultados' class='w3-container w3-center w3-margin-top'>
                A média dos preços dos jogos é: R$" .
    number_format($media['media_preco_jogos'], 2, ',', '.') .
    "</div>";
  } else {

   echo "<div id='resultado'>
                <p>Não existem jogos cadastrados.</p>
              </div>";
  }
 }

 function update($conexao, $nomeDaTabela)
 {
  $nomePesquisado = trim($conexao->escape_string($_POST["nome-atualizado"]));
  $precoAtualizado = trim($conexao->escape_string($_POST["preco-atualizado"]));

  $sql = "update $nomeDaTabela set preco = $precoAtualizado where nome = '$nomePesquisado';";
  $conexao->query($sql) or die($conexao->error);

  if ($conexao->affected_rows > 0) {
   echo "<div class='w3-container w3-center'>";
   echo "<p> Jogo atualizado com sucesso! </p>";
   echo "</div>";
  } else {
   echo "<p> Não foi possível atualizar o jogo. Verifique se o nome pesquisado existe. </p>";
  }
 }
}
