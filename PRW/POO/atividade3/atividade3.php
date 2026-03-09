<!DOCTYPE html>
<html>
<head>
 <meta charset='utf-8'>
 <meta http-equiv='X-UA-Compatible' content='IE=edge'>
 <title> Introdução à POO com PHP </title>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
 <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
 <h1> Atividade de aprendizado em POO com PHP - Atividade 3 </h1>
 
 <?php
 require_once "ItemInformatica.inc.php";

 $item = new ItemInformatica();

 echo "<p> " . $item->exibirDetalhes() . "</p>";
 ?>

</body>
</html>