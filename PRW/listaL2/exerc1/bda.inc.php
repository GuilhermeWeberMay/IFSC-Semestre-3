<?php
// Esta include cria a classe que encapsula todo o comportamento da conexão do PHP com o banco de dados
class BancoDeDados {
 public $nome;
 public $nomeTabela;
 public $servidor;
 public $usuario;
 public $senha;

 // Método construtor da classe
 public function __construct($nome, $nomeTabela, $servidor, $usuario, $senha) {
  $this->nome = $nome;
  $this->nomeTabela = $nomeTabela;
  $this->servidor = $servidor;
  $this->usuario = $usuario;
  $this->senha = $senha;
 }

 // Método que estabelece a ligação virtual entre o nosso código PHP e o servidor MySQL (que o PHP "converse" com o MySQL)
 function conectar() {
  $conexao = new mysqli($this->servidor, $this->usuario, $this->senha, $this->nome) OR die ($conexao->connect_error);
  return $conexao;
 }
}
?>