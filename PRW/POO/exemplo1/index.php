<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Introdução à POO com PHP </title>
 <link rel="stylesheet" href="poo.css">
</head>
<body>
 <h1> Fundamentos do PHP com POO - Exemplo 1 </h1>

 <?php
 require_once 'Item.inc.php';

 // Criar um objeto Item
 $item = new Item();

 // Adicionando valores aos atributos do objeto Item
 $item->nome = "Impressora";
 $item->preco = 10.99;
 $item->categoria = "Hardware periférico";

 // Invocando o método que mostra a categoria do objeto criado
 $categ = $item->getCategoria();
 echo "<p> Categoria: $categ </p>";

 // Invocando o método que mostra o preço atual do item 
 $precoAtual = $item->getPreco();
 echo "<p> Preço atual: R$ $precoAtual </p>";

 // Modificar o preço atual
 $item->setPreco(20.90);

 // Invocando o método que mostra o preço atual do item 
 $precoAtual = $item->getPreco();
 echo "<p> Preço atual: R$ $precoAtual </p>";

 ?>
</body>
</html>