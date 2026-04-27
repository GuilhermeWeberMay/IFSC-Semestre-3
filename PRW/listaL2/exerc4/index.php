<!DOCTYPE html>
<html lang="pt-BR">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos de Banco de Dados com PHP </title>
 <link rel="stylesheet" href="style.css">
</head>

<body>
 <h1> PHP + MYSQL - Exercício 4 </h1>
 <fieldset>
  <legend> Clinica GWM - Cadastro de médico </legend>
  <form action="index.php" method="post">

   <label for="id"> Nome:</label>
   <input type="text" id="id" name="nome-medico" autofocus><br>

   <label for="preco">CRM::</label>
   <input type="number" id="preco" name="crm" min="0" step="0.01"><br>

   <button type="submit" name="cadastrar-medico"> Cadastrar medico </button>

  </form>
 </fieldset>

 <!-- Modulo de paciente-->
 <fieldset>
  <legend> Clinica GWM - Cadastro de paciente </legend>
  <form action="index.php" method="post">

   <label for="id"> Nome:</label>
   <input type="text" id="id" name="nome-paciente"><br>

   <label for="preco">CRM do médico: </label>
   <input type="number" id="preco" name="crm-atendimento" min="0" step="0.01"><br>

   <label for="preco">Data da internação: </label>
   <input type="date" id="preco" name="data"><br>

  </form>
 </fieldset>

 <!-- Modulo de pesquisa de médico-->
 <fieldset>
  <legend> Clinica GWM - Pesquisa de médico </legend>
  <form action="index.php" method="post">

   <label for="nome"> Nome do médico:</label>
   <input type="number" id="nome" name="nome-pesquisado"><br>

  </form>
 </fieldset>

 <div>
  <label for=""> Escolha a operação: </label>
  <input type="radio" name="operacao" value="1"> <label for=""> Cadastro médico </label>
  <input type="radio" name="operacao" value="2"> <label for=""> Cadastro paciente </label>
  <input type="radio" name="operacao" value="3"> <label for=""> Encontrar pacientes do médico </label> <br>
  <button name="exec"> Realizar operação selecionada </button>
 </div>

</body>

</html>