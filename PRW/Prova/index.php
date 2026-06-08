<!DOCTYPE html>
<html lang='pt-br'>

<head>
 <meta charset='utf-8'>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
 <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-grey.css">
 <link rel="stylesheet" href="style.css">
 <title> GWM Games </title>
 <?php
 require "banco.php";
 $banco = new BancoDeDados('localhost', 'root', '', 'db_lan_house', 'jogos');
 $conexao = $banco->criarConexao();
 $banco->criarBanco($conexao);
 $banco->abrirBanco($conexao);
 $banco->definirCharset($conexao);
 $banco->criarTabelaJogos($conexao);
 ?>

</head>

<body>
 <div class="w3-container w3-center w3-border w3-margin-bottom w3-theme-dark">
  <h1 class=""> GWM GamingHouse </h1>
 </div>

 <form action="index.php" method="POST">
  <div class='w3-container w3-center'>
   <fieldset>
    <legend> Cadastro de Jogos</legend>
    <label for="nome"> Nome: </label>
    <input type="text" name="nome" id="nome"> <br>

    <label for="preco"> Preço: </label>
    <input type="number" name="preco" id="preco" min="0" max="500" step="0.01"> <br>

    <label for="genero"> Categoria do jogo: </label>
    <select name="genero" id="genero">
     <option value="RPG"> RPG </option>
     <option value="FPS"> FPS </option>
     <option value="AVENTURA"> Aventura </option>
    </select><br>

    <button class="w3-button w3-border w3-round-xxlarge w3-margin-top w3-margin-bottom w3-hover-yellow w3-bold w3-italic w3-yellow" name="cadastrar" type="submit"> Cadastrar
     jogo</button>
   </fieldset>
  </div>
 </form>
 <?php
 require "Jogo.php";
 $jogo = new Jogo();

 if (isset($_POST['cadastrar'])) {
  $jogo->receberDados($conexao);
  $jogo->create($conexao, $banco->nomeDaTabelaJogos);
  echo "<div class='w3-container w3-center'> <p> Jogo cadastrado com sucesso! </p> </div>";
 }
 ?>

 <form action="index.php" method="POST">
  <div class="w3-container w3-center">
   <fieldset>
    <legend> Atualização de Jogos </legend>

    <label for="nome-atualizado"> Nome: </label>
    <input type="text" name="nome-atualizado" id="nome-atualizado"> <br>

    <label for="preco-atualizado"> Preço: </label>
    <input type="number" name="preco-atualizado" id="preco-atualizado" min="0" max="500" step="0.01"> <br>

    <button class="w3-button w3-border w3-round-xxlarge w3-margin-top w3-margin-bottom w3-hover-yellow w3-bold w3-italic w3-yellow"
     name="atualizar"> Atualizar
     jogo</button>

   </fieldset>
  </div>
 </form>
 <?php
 if (isset($_POST['atualizar'])) {
  $jogo->update($conexao, $banco->nomeDaTabelaJogos);
 }
 ?>
 <form action="index.php" method="post">
  <div class="w3-container w3-center">
   <button type="submit" name="media" id="botao" class="w3-button w3-round-xxlarge w3-margin-top w3-margin-bottom w3-border w3-yellow"> Visualizar média dos valores </button>
  </div>
 </form>
 <?php
 if (isset($_POST['media'])) {
  $jogo->mediaPrecos($conexao, $banco->nomeDaTabelaJogos);
 }
 ?>

</body>

</html>