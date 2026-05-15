<?php
class Cliente
{
 public $nome, $cpf, $email, $telefone, $rua, $numero, $cep, $usuario, $senha;

 function receberDados($conexao)
 {
  $this->nome           = trim($conexao->escape_string($_POST["nome"]));
  $this->cpf            = trim($conexao->escape_string($_POST["cpf"]));
  $this->email          = trim($conexao->escape_string($_POST["email"]));
  $this->telefone       = trim($conexao->escape_string($_POST["telefone"]));
  $this->rua            = trim($conexao->escape_string($_POST["rua"]));
  $this->numero         = trim($conexao->escape_string($_POST["numero-endereco"]));
  $this->cep            = trim($conexao->escape_string($_POST["cep"]));
  $this->usuario        = trim($conexao->escape_string($_POST["usuario"]));
  $senhaCriptografada   = password_hash(trim($conexao->escape_string($_POST["senha"])), PASSWORD_ARGON2I);
  $this->senha          = $senhaCriptografada;
 }

 function create($conexao, $nomeDaTabela)
 {
  $sql = "INSERT $nomeDaTabela VALUES(
            null,
            '$this->nome',
            '$this->cpf',
            '$this->email',
            '$this->telefone',
            '$this->rua',
            '$this->numero',
            '$this->cep',
            '$this->usuario',
            '$this->senha')";

  $conexao->query($sql) or die($conexao->error);
 }
}
