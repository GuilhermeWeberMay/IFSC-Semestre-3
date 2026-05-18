<?php
class BancoDeDados
{
 public $nomeDoBanco;
 public $nomeDaTabelaClientes;
 public $nomeDaTabelaVeiculos;
 public $nomeDaTabelaAdmin;
 public $servidor;
 public $usuario;
 public $senha;

 function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela1, $nomeTabela2, $nomeTabela3)
 {
  $this->servidor     = $servidorBanco;
  $this->usuario      = $usuarioBanco;
  $this->senha        = $senhaBanco;
  $this->nomeDoBanco  = $nomeBanco;
  $this->nomeDaTabelaClientes  = $nomeTabela1;
  $this->nomeDaTabelaVeiculos  = $nomeTabela2;
  $this->nomeDaTabelaAdmin     = $nomeTabela3;
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


 function criarTabelaClientes($conexao)
 {
  $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabelaClientes (
             ID INT PRIMARY KEY AUTO_INCREMENT,
             nome VARCHAR(300),
             cpf varchar(15),
             email VARCHAR(300),
             telefone CHAR(15),
             rua varchar (300),
             numero varchar(10),
             cep char(9),
             usuario varchar(100),
             senha varchar(128)
             ) ENGINE=innoDB;";

  $conexao->query($sql) or die($conexao->error);
 }

 function criarTabelaVeiculo($conexao)
 {
  $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabelaVeiculos (
    ID int primary key not null auto_increment,
    fabricante varchar(300),
    modelo varchar(300),
    placa varchar(300),
    cor varchar(100),
    ano char(8)
    ) ENGINE=innoDB;";

  $conexao->query($sql) or die($conexao->error);
 }

 function criarTabelaAdministrador($conexao)
 {
  $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabelaAdmin(
    ID int not null auto_increment,
    fabricante varchar(300),
    modelo varchar(300),
    placa varchar(300),
    cor varchar(100),
    ano char(8)
    )ENGINE=innoDB;";

  $conexao->query($sql) or die($conexao->error);
 }
 function desconectar($conexao)
 {
  $conexao->close();
 }
}
