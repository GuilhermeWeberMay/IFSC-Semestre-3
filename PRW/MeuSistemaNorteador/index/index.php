<!DOCTYPE html>
<html lang='pt-BR'>

<head>
 <meta charset='utf-8'>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
 <title> Lavação GWM </title>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
 <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-deep-purple.css">
 <link rel='stylesheet' href='../css/main.css'>
 <!-- O ID nas tags html serve para navegação de telas SPA -->
 <!-- Todas as Div's devem ter um seu atributo class escrito 'tela' -->
</head>

<body>
 <!-- Menu Principal (não muda em todas as telas)-->
 <div class='w3-container w3-theme w3-margin-bottom'>
  <nav> <!-- Professor o NAV fica antes da DIV ou depois?-->
   <h1 class="w3-center"> Lavação GWM - PRW2 </h1>
   <button class="w3-button" onclick="navega('home')"> Página Incial </button>
   <button class="w3-button" onclick="navega('formulario-cliente')"> Cadastro Cliente </button>
   <button class="w3-button" onclick="navega('formulario-veiculo')"> Cadastro Veículo </button>
   <button class="w3-button" onclick="navega('login-cliente')"> Login Cliente </button>
   <button class="w3-button" onclick="navega('login-administrador')"> Login Administrador </button>
   <button class="w3-button" onclick="navega('contato')"> Contato </button>
  </nav>
 </div>

 <form action="../index/index.php" method="post">
  <div class="w3-container w3-hide tela w3-border w3-margin" id="formulario-cliente">
   <label for="nome"> Nome: </label>
   <input type="text" name="nome" id="nome" class="w3-input"> <br>

   <label for="cpf"> Cpf: </label>
   <input type="text" name="cpf" id="cpf" class="w3-input" value="___.___.___-__" maxlength="14"> <br>

   <label for="email"> E-mail: </label>
   <input type="email" name="email" id="email" class="w3-input"> <br>

   <label for="telefone"> Telefone: </label>
   <input type="text" name="telefone" id="telefone" class="w3-input" value="(__) _____-____" maxlength="14">

   <label for="rua"> Rua: </label>
   <input type="text" name="rua" id="rua" class="w3-input "> <br>

   <label for="numero-endereco"> Número: </label>
   <input type="text" name="numero-endereco" id="numero-endereco" class="w3-input"> <br>

   <label for="cep"> CEP: </label>
   <input type="text" name="cep" id="cep" class="w3-input" value="_____-___" maxlength="8"> <br>

   <label for="usuario"> Usuário: </label>
   <input type="text" name="usuario" id="usuario" class="w3-input"><br>

   <label for="senha"> Senha: </label>
   <input type="password" name="senha" id="senha" class="w3-input"> <br>

   <button type="submit" id="cadastrar-cliente" name="cadastrar-cliente" class="w3-button w3-block w3-theme-l1 w3-margin-top w3-margin-bottom"
    onclick="navega('resposta-forms-cliente')"> Cadastrar cliente
   </button>
  </div>
 </form>

 <div class="w3-container tela" id="home">
  <h2 class="w3-center"> Caro(a) usuário, bem-vindo(a) </h2>
  <p class="w3-center"> Este protótipo de aplicação web, simulando um sistema de lavação de automóveis, executa, entre
   outros, as
   seguintes operações: <br> <br>
   a)Cadastrar clientes da aplicação; <br>
   b)Cadastrar dados do veículo de cada cliente; <br>
   c)Logar o cliente da aplicação <br>
   d)Logar os administradores da aplicação; <br>
   e)Outros serviços; <br>
  </p>
 </div>

 <form action="../index/index.php" method="post">
  <div class="w3-container w3-hide tela w3-border w3-margin" id="formulario-veiculo">
   <label for="fabricante"> Fabricante: </label>
   <input type="text" name="fabricante" id="fabricante" class="w3-input"> <br>

   <label for="modelo"> Modelo: </label>
   <input type="text" name="modelo" id="modelo" class="w3-input"> <br>

   <label for="tipoPlaca">Tipo da placa:</label>
   <select id="tipoPlaca" class="w3-input">
    <option value="mercosul">Mercosul (ABC1D23)</option>
    <option value="antiga" selected>Placa Antiga (ABC-1234)</option>
   </select> <br>

   <label for="placa" class="">Placa:</label>
   <input type="text" id="placa" name="placa" placeholder="ABC-1234" maxlength="8" class="w3-margin-top w3-input">
   <div id="feedback"></div><br>

   <label for="cor"> Cor: </label>
   <input type="text" name="cor" id="cor" class="w3-input"> <br>

   <label for="ano"> Ano: </label>
   <input type="text" name="ano" id="ano" class="w3-input"> <br>

   <button type="submit" id="cadastrar-veiculo" name="cadastrar-veiculo" class="w3-button w3-block w3-theme-l1 w3-margin-top w3-margin-bottom" disabled> Cadastrar veículo
   </button>
  </div>
 </form>


 <div class="w3-container w3-hide tela" id="login-cliente">
  <fieldset>
   <legend> Login Cliente </legend>
   <form action="index.php">
    <label for="usuario"> Usuário: </label>
    <input type="text" name="usuario-login" id="usuario" class="w3-input"><br>

    <label for="senha"> Senha: </label>
    <input type="password" name="senha-login" id="senha" class="w3-input"> <br>

    <button type="submit" id="login-cliente" class="w3-button w3-block w3-theme-l1 w3-margin-top" name="login-cliente"> Fazer login </button>

   </form>
  </fieldset>
 </div>

 <div class="w3-container w3-hide tela" id="login-administrador">
  <fieldset>
   <legend> Login Administrador </legend>
   <form action="index.php">
    <label for="login"> Login: </label>
    <input type="text" name="adm-login" id="login" class="w3-input"><br>

    <label for="senha"> Senha: </label>
    <input type="password" name="adm-senha" id="senha" class="w3-input"> <br>

    <button type="submit" id="login-admin" class="w3-button w3-block w3-theme-l1 w3-margin-top"> Fazer login </button>

   </form>
  </fieldset>
 </div>

 <div class='w3-container w3-center w3-round-xxlarge w3-border w3-theme-d1 w3-hide tela' id="resposta-forms-cliente">
  <h3> Cliente cadastrado com sucesso! </h3>
 </div>

 <div class='w3-container w3-center w3-round-xxlarge w3-border w3-theme-d1 w3-hide tela' id="resposta-forms-veiculo">
  <h3> Veículo cadastrado com sucesso! </h3>
 </div>


 <div class="w3-container w3-hide tela" id="contato">
  <fieldset>
   <legend> Entre em contato </legend>
   <label for="sugestao"> Deixe sua sugestão abaixo: </label> <br>
   <textarea name="sugestao" id="sugestao"></textarea>
   <button type="submit" id="enviar-sugestao" class="w3-button w3-block w3-theme-l1 w3-margin-top"> Enviar sugestão </button>
  </fieldset>

 </div>

 <?php
 require "../includes/banco-dados.inc.php";
 require "../php/Cliente.php";
 require "../php/Veiculo.php";

 $banco = new BancoDeDados('localhost', 'root', '', 'projeto_lavacao_prw2', 'clientes', 'veiculos', 'administradores');
 $cliente = new Cliente();
 $veiculo = new Veiculo();

 $conexao = $banco->criarConexao();
 $banco->criarBanco($conexao);
 $banco->abrirBanco($conexao);
 $banco->definirCharset($conexao);
 $banco->criarTabelaClientes($conexao);
 $banco->criarTabelaVeiculo($conexao);

 if (isset($_POST['cadastrar-cliente'])) {
  $cliente->receberDados($conexao);
  $cliente->create($conexao, $banco->nomeDaTabelaClientes);
  echo "<div class='w3-container w3-center w3-round-xxlarge w3-border w3-theme-d1'>
         <h3 class='tela'> Cliente cadastrado com sucesso! </h3>
        </div>";
 }
 if (isset($_POST['cadastrar-veiculo'])) {
  $veiculo->receberDados($conexao);
  $veiculo->create($conexao, $banco->nomeDaTabelaVeiculos);
  echo "<div class='w3-container w3-center w3-round-xxlarge w3-border w3-theme-d1'>
         <h3 class='tela'> Veículo cadastrado com sucesso! </h3>
        </div>";
 }

 if (isset($_POST['login-cliente']))
  $cliente->login($conexao, $banco->nomeDaTabelaClientes);
 ?>

 <footer class="w3-center">
  <div class="w3-center tela"></div>
  <p> Sitema feito por Guilherme Weber May no Curso Técnico de Desenvolvimento de Sistemas do Instituto Federal de
   Santa Catarina - IFSC Campûs Florianópolis - Centro <br>
   Copyright &copy;2025 - todos os direitos reservados. Proibida a reprodução parcial ou total do conteúdo presente
   nesta aplicação <br>
   Entre em contato conosco: <br>
   <span onclick="navega('contato')"> Contato </span>
  </p>
  </div>
 </footer>


 <script src="../js/valida-cpf-cep.js"></script>
 <script src="../js/valida-placa.js"></script>
 <script src="../js/telas.js"></script>
</body>

</html>