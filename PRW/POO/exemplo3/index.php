<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Introdução à POO com PHP </title>
 <link rel="stylesheet" href="poo.css">
</head>
<body>
 <h1> Fundamentos do PHP com POO - Exemplo 3 </h1>
 
 <?php
 require_once 'ContaBancaria.inc.php';

 $cb1 = new ContaBancaria(1000);
 $cb2 = new ContaBancaria(1000);

 // Primeira conta corrente
 echo "<p> Saldo ContaBancaria1: " . $cb1->getSaldo() . "</p>";
 echo "<p> Sacando dinheiro. </p>";
 echo $cb1->sacar(1000);
 echo "<p> Seu saldo é de: " . $cb1->getSaldo();
 echo "<p> Depositando 2000 reais " . $cb1->depositar(2000);
 echo "<p> Seu saldo é de: " . $cb1->getSaldo();

 echo "<p> ---------- </p>";

 // Segunda conta corrente
 echo "<p> Saldo ContaBancaria2: " . $cb2->getSaldo() . "</p>";
 echo "<p> Tentando sacar o valor de 1001 reais. </p>";
 echo $cb2->sacar(1001);
 echo "<p> Seu saldo é de: " . $cb2->getSaldo();

 ?>
</body>
</html>