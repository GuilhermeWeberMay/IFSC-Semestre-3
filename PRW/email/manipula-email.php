<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> E-mails com PHP </title>
 <link rel="stylesheet" href="formata-email.css">
</head>

<body>
 <h1> Envio de e-mails com PHP usando o servidor do Google </h1>

 <form action="manipula-emails.php" method="post">
  <fieldset>
   <legend> Envio de e-mails ao cliente </legend>

   <label class="alinha"> Nome completo do usuário: </label>
   <input type="text" name="nome" autofocus> <br>

   <label class="alinha"> Login do usuário: </label>
   <input type="text" name="login"> <br>

   <label class="alinha"> Senha do usuário: </label>
   <input type="password" name="senha"> <br>

   <label class="alinha"> Data de aniversário: </label>
   <input type="date" name="aniversario"> <br>

   <label class="alinha"> E-mail do usuário: </label>
   <input type="email" name="email"> <br>

   <button name="enviar"> Enviar </button>
  </fieldset>
 </form>
 
 <?php
 // Configuração necessária no nosso script para utilizar os comandos da biblioteca
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require "./PHPMailer/src/Exeption.php";
 require "./PHPMailer/src/PHPMailer.php";
 require "./PHPMailer/src/SMTP.php";
 
 if (isset($_POST["enviar"])){
  $emailDestinatario       = $_POST["email"];
  $aniversarioDestinatario = $_POST["aniversario"];
  $nomeDestinatario        = $_POST["nome"];
  $loginDestinatario       = $_POST["login"];
  $senhaDestinatario       = $_POST["senha"];

  // Criando o objeto $mail a partir da biblioteca
  $objMail = new PHPMailer(true);

  // Para evitar problemas com caracteres especiais
  $objMail->CharSet = "UTF-8";
  // Mostra o erro em português
  $objMail->setLanguage("pt-br");
  
  // Configurações do servidor de e-mail do Google
  $objMail->Host = "smtp.gmail.com";
  $objMail->Username = "remetente.ifsc2016@gmail.com";
  $objMail->Password = "rdye xans iaej eney";
  $objMail->Port = 465; // Ou 587 o número da porta
  $objMail->SMTPSecure = "ssl";
  $objMail->isSMTP();
  $objMail->SMTPAuth = true;
  
  // Configuração de dados da mensagem
  $objMail->isHTML(true);
  $objMail->Subject = "Teste de e-mail com PHP";

  // Dados do remetente - NÓS, administradores
  $objMail->addReplyTo("remetente.ifsc2016@gmail.com", "Para o administrador do sistema");
  $objMail->setFrom("remetente.ifsc2016@gmail.com", "Para o administrador do sistema");

  // Dados do destinatário do e-mail
  $objMail->addAddress($emailDestinatario, $nomeDestinatario);

  // Configuração da propriamente dita e outros elementos adicionais na mensagem. Para envio de arquivos externo, nada pode ser enviado no corpo da mensagem.
  /*
  $objMail->Body = "<h1> VocÊ efetuou cadastro em nossa aplicação web. Confira os dados abaixo: </h1>
  <p> Nome: $nomeDestinatario <br>
      Email: $emailDestinatario <br>
      Data de aniversário: $aniversarioDestinatario <br>
      Login de usuário: $loginDestinatario </p>";
  */

  // Aqui, nesta seção, podemos enviar uma página externa completa, contendo HTML e CSS incorporado
  $objMail->msgHTML(file_get_contents("lancamentos.html"));
  
  // Envios de anexos
  $objMail->addAttachment("anexo1.pdf");
  $objMail->addAttachment("anexo2.doc");

  // Finalmente, testamos se o e-mail foi enviado
  if($objMail->Send()){
   echo"<p> Cadastro efetuado com sucesso em nossa aplicação web. Abra seu email e confira os dados fornecidos. Qualquer problema, entre em contato. </p>";
  }else{
   echo"<p> E-mail teve problemas no envio. Erro: $objMail->ErrorInfo </p>";
  }

 }



 ?>

</body>
</html>