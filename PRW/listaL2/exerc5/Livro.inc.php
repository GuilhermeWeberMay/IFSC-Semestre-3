<?php
class Livro
{
 public $isbn, $titulo, $autor, $preco, $dataLancamento;

 function receberDados($conexao)
 {
  $this->isbn           = trim($conexao->escape_string($_POST['isbn']));
  $this->titulo         = trim($conexao->escape_string($_POST['titulo']));
  $this->autor          = trim($conexao->escape_string($_POST['autor']));
  $this->preco          = trim($conexao->escape_string($_POST['preco']));
  $this->dataLancamento = trim($conexao->escape_string($_POST['data']));
 }

 // Módulo de cadastro dos livros - Questão 1
 function create($conexao, $nomeTabela)
 {
  $sql = "INSERT INTO $nomeTabela(isbn, titulo, autor, preco, data)
   values ('$this->isbn ', '$this->titulo', '$this->autor', $this->preco, '$this->dataLancamento');";
  $conexao->query($sql) or die($conexao->error);
 }

 // Módulo de atualização dos livros - Questão 2
 function update($conexao, $nomeTabela)
 {
  $isbnAtulizado = trim($conexao->escape_string($_POST['isbn-atualizado']));
  $tituloAtulizado = trim($conexao->escape_string($_POST['titulo-atualizado']));
  $autorAtulizado = trim($conexao->escape_string($_POST['autor-atualizado']));
  $precoAtulizado = trim($conexao->escape_string($_POST['preco-atualizado']));
  $dataAtulizada = trim($conexao->escape_string($_POST['data-atualizada']));

  $sql = "UPDATE livros SET 
   titulo = '$tituloAtulizado', autor = '$autorAtulizado', preco = $precoAtulizado, data = '$dataAtulizada' WHERE isbn = $isbnAtulizado;";
  $conexao->query($sql) or die($conexao->error);

  if ($conexao->affected_rows > 0) {
   echo "<p> Livro atualizado com sucesso! </p>";
  } else {
   echo "<p> Não foi possível atualizar o livro. Verifique se o ISBN pesquisado existe. </p>";
  }
 }


 // Módulo de exclusão dos livros com mais de 2 anos - Questão 3
 function delete($conexao, $nomeTabela)
 {
  $sql = "DELETE FROM $nomeTabela WHERE data < DATE_SUB(CURDATE(), INTERVAL 2 YEAR);";
  $conexao->query($sql) or die($conexao->error);

  $linhasExcluidas = $conexao->affected_rows;

  if ($linhasExcluidas > 0) {
   echo "<p> $linhasExcluidas livro(s) excluído(s) com sucesso! </p>";
  } else {
   echo "<p> Não foi possível excluir os livros. Verifique se existem livros com mais de 2 anos de lançamento. </p>";
  }
 }

 // Módulo de listagem dos livros cadastrados - Questão 4
 function read($conexao, $nomeTabela)
 {
  echo "<table>
         <caption> Dados dos livros cadastrados </caption>
         <tr>
          <th>ISBN</th>
          <th>Título</th>
          <th>Autor</th>
          <th>Preco</th>
          <th>Data de lançamento</th>
         </tr>";

  $sql = "SELECT * FROM $nomeTabela";

  $resultado = $conexao->query($sql) or die($conexao->error);

  while ($vetorRegistro = $resultado->fetch_array()) {
   // Para evitarmos o ataque do tipo XSS, usamos o comando de sanitização a seguir
   $isbn      = htmlentities($vetorRegistro[0], ENT_QUOTES, 'UTF-8');
   $titulo   = htmlentities($vetorRegistro[1], ENT_QUOTES, 'UTF-8');
   $autor = htmlentities($vetorRegistro[2], ENT_QUOTES, 'UTF-8');
   $preco = htmlentities($vetorRegistro[3], ENT_QUOTES, 'UTF-8');
   $data = htmlentities($vetorRegistro[4], ENT_QUOTES, 'UTF-8');

   echo "<tr>
  <td>$isbn</td>
  <td>$titulo</td>
  <td>$autor</td>
  <td>$preco</td>
  <td>$data</td>
  </tr>";
  }
  echo "</table>";
 }
}
