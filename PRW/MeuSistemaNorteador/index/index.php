<!DOCTYPE html>
<html lang='pt-BR'>

<head>
 <meta charset='utf-8'>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
 <title> Lavação GWM </title>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
 <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-deep-purple.css">
 <link rel='stylesheet' href='../css/main.css'>
</head>

<body>
 <!-- Menu Principal (não muda em todas as telas)-->
 <div class='w3-container w3-theme w3-margin-bottom'>
  <nav> <!-- Professor o NAV fica antes da DIV ou depois?-->
   <h1 class="w3-center"> Lavação GWM - PRW2 </h1>
   <button class="w3-button"> Página Incial </button>
   <button class="w3-button"> Cadastro Cliente </button>
   <button class="w3-button"> Cadastro Veículo </button>
   <button class="w3-button"> Contato </button>
   <button class="w3-button"> Login Cliente </button>
   <button class="w3-button"> Login Administrador </button>
  </nav>
 </div>


 <div class="formulario w3-container w3-hide">
  <fieldset>
   <legend> Cadastro de Cliente </legend>
   <form action="index.php">

    <label for="nome"> Nome: </label>
    <input type="text" name="nome" id="nome" class="w3-input"> <br>

    <label for="email"> E-mail: </label>
    <input type="email" name="email" id="email" class="w3-input"> <br>

    <label for="telefone"> Telefone: </label>
    <input type="tel" name="telefone" id="telefone" class="w3-input "> <br>

    <label for="rua"> Rua: </label>
    <input type="text" name="rua" id="rua" class="w3-input "> <br>

    <label for="numero-endereco"> Número: </label>
    <input type="text" name="numero-endereco" id="numero-endereco" class="w3-input"> <br>

    <label for="cep"> CEP: </label>
    <input type="text" name="cep" id="cep" class="w3-input"> <br>

    <label for="usuario"> Usuário: </label>
    <input type="text" name="usuario" id="usuario" class="w3-input"><br>

    <label for="senha"> Senha: </label>
    <input type="password" name="senha" id="senha" class="w3-input"> <br>

    <button type="submit" id="cadastrar-cliente" class="w3-button w3-block w3-theme-l1 w3-margin-top"> Cadastrar cliente </button>
   </form>
  </fieldset>
 </div>

 <div class="w3-container w3-hide home">
  <main>
   <h2 class="w3-center"> Caro(a) usuário, bem-vindo(a) </h2>
   <p class="w3-center"> Este protótipo de aplicação web, simulando um sistema de lavação de automóveis, executa, entre outros, as
    seguintes operações: <br> <br>
    a)Cadastrar clientes da aplicação; <br>
    b)Cadastrar dados do veículo de cada cliente; <br>
    c)Logar o cliente da aplicação <br>
    d)Logar os administradores da aplicação; <br>
    e)Outros serviços; <br>
   </p>
  </main>
 </div>

 <div class="formulario w3-container w3-hide">
  <fieldset>
   <legend> Cadastro de Veículo </legend>
   <form action="index.php">

    <label for="fabricante"> Fabricante: </label>
    <input type="text" name="fabricante" id="fabricante" class="w3-input"> <br>

    <label for="modelo"> Modelo: </label>
    <input type="text" name="modelo" id="modelo" class="w3-input"> <br>

    <label for="placa"> Placa: </label>
    <input type="text" name="placa" id="placa" class="w3-input"> <br>

    <label for="cor"> Cor: </label>
    <input type="text" name="cor" id="cor" class="w3-input"> <br>

    <label for="ano"> Ano: </label>
    <input type="text" name="ano" id="ano" class="w3-input"> <br>

    <button type="submit" id="cadastrar-veiculo" class="w3-button w3-block w3-theme-l1 w3-margin-top"> Cadastrar veículo </button>
   </form>
  </fieldset>
 </div>

 <div class="w3-container">
  <fieldset>
   <legend> Login Cliente </legend>
   <form action="index.php">
    <label for="usuario"> Usuário: </label>
    <input type="text" name="usuario" id="usuario" class="w3-input"><br>

    <label for="senha"> Senha: </label>
    <input type="password" name="senha" id="senha" class="w3-input"> <br>

    <button type="submit" id="login-cliente" class="w3-button w3-block w3-theme-l1 w3-margin-top"> Fazer login </button>

   </form>
  </fieldset>
 </div>

 <div class="w3-container">
  <fieldset>
   <legend> Login Administrador </legend>
   <form action="index.php">
    <label for="login"> Login: </label>
    <input type="text" name="login" id="login" class="w3-input"><br>

    <label for="senha"> Senha: </label>
    <input type="password" name="senha" id="senha" class="w3-input"> <br>

    <button type="submit" id="login-admin" class="w3-button w3-block w3-theme-l1 w3-margin-top"> Fazer login </button>

   </form>
  </fieldset>
 </div>

 <div class="rodape w3-center w3-hide">
  <footer>
   <p> Sitema feito por Guilherme Weber May no Curso Técnico de Desenvolvimento de Sistemas do Instituto Federal de
    Santa Catarina - IFSC Campûs Florianópolis - Centro <br>
    Copyright &copy;2025 - todos os direitos reservados. Proibida a reprodução parcial ou total do conteúdo presente
    nesta aplicação <br>
    Entre em contato conosco: <br>
    <a href="contato.html" target="_blank"> Contato </a>
   </p>
  </footer>
 </div>
 <script src="../js/validaFormularios.js"></script>
 <script src="../js/telas.js"></script>
</body>

</html>