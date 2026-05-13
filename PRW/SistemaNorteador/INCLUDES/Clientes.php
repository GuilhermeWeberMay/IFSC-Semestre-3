<?php
 class Cliente {
  public $nome, $endereco, $email, $usuario, $senha, $telefone;


  function recebeDados ($conexao){
   $this-> nome = trim($conexao->escape_string($_POST['cliente']));
   $this-> endereco = trim($conexao->escape_string($_POST['endereco']));
   $this-> email = trim($conexao->escape_string($_POST['email']));
   $this-> telefone = trim($conexao->escape_string($_POST['telefone']));
   $this-> usuario = trim($conexao->escape_string($_POST['login']));
   $this-> senha  = password_hash(trim($conexao->escape_string($_POST['senha'])), PASSWORD_ARGON2I);
  }
  // TODO
  function cadastrar ($conexao, $nomeTabela){
   $sql = "INSERT INTO $nomeTabela VALUES 
   null,
   ";

   $conexao->query($sql) or exit ($conexao->error);
  }
 }
?>