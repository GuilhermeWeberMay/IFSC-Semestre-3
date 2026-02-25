<?php
class Curso{
 public $nome;
 public $duracao;

 // Método que cria o construtor personalizado
 function __construct($nome, $duracao){
  $this->nome = $nome;
  $this->duracao = $duracao;
 }

 function classificaCurso(){
  // Classificar o curso acessando o atributo duracao do objeto
  if($this->duracao <= 1){
   $mensagem = "Curso de curta duração";
  }elseif ($this->duracao < 4){
   $mensagem = "Curso de média duração";
  }else{
   $mensagem = "Curso de longa duração";
  }
  return $mensagem;
 }

 function getNome (){
  return $this->nome;
 }
 function getDuracao (){
  return $this->duracao;
 }
}
?>