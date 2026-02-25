<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Introdução à POO com PHP </title>
 <link rel="stylesheet" href="poo.css">
</head>
<body>
 <h1> Fundamentos do PHP com POO - Exemplo 2 </h1>

 <?php
 require_once 'exerc2.inc.php';

 // Criar um objeto Item
 $objCurso1 = new Curso("Gestão da tecnologia da Informação", 6);
 $objCurso2 = new Curso("Desenvolvimento de Sistemas", 3);

 echo "<p> Nome: ". $objCurso1->getNome() . "</p>";
 echo "<p> Duração: ".$objCurso1->getDuracao() . "</p>";
 echo "<p> Classificação: ".$objCurso1->classificaCurso() . "</p>";

 echo "<p> Nome: ". $objCurso2->getNome() . "</p>";
 echo "<p> Duração: ".$objCurso2->getDuracao() . "</p>";
 echo "<p> Classificação: ".$objCurso2->classificaCurso() . "</p>";

 ?>
</body>
</html>