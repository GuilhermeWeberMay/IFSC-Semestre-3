<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Introdução à POO com PHP </title>
 <link rel="stylesheet" href="formata-form.css">
</head>
<body>
  <h1> Atividade de aprendizado em POO com PHP - Atividade 1 </h1>
 
 <?php
  require "Livro.inc.php";

  $livro = new Livro ();

  // Aplicar o desconto e atualizar o preço
  $livro->calcularDesconto();

  // Mostrar os dados
  echo $livro->superGet();
 ?>

</body>
</html>