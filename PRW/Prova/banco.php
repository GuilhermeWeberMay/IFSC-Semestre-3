<?php
class BancoDeDados
{
 public $nomeDoBanco;
 public $nomeDaTabelaJogos;
 public $servidor;
 public $usuario;
 public $senha;

 function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela)
 {
  $this->servidor     = $servidorBanco;
  $this->usuario      = $usuarioBanco;
  $this->senha        = $senhaBanco;
  $this->nomeDoBanco  = $nomeBanco;
  $this->nomeDaTabelaJogos  = $nomeTabela;
 }

 function criarConexao()
 {
  $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) or die($conexao->error);
  return $conexao;
 }

 function criarBanco($conexao)
 {
  $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
  $conexao->query($sql) or die($conexao->error);
 }

 function abrirBanco($conexao)
 {
  $conexao->select_db($this->nomeDoBanco);
 }

 function definirCharset($conexao)
 {
  $conexao->set_charset("utf8");
 }

 function desconectar($conexao)
 {
  $conexao->close();
 }

 function criarTabelaJogos($conexao)
 {
  $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabelaJogos (
             id int unique auto_increment not null primary key,
             nome varchar(100) not null,
             preco decimal(20,2) not null,
             genero varchar(50) not null
             ) ENGINE=innoDB;";

  $conexao->query($sql) or die($conexao->error);
 }
}
