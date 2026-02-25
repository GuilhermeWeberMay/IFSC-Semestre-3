<?php
// Declarando a classe item
class Item{
 // Definindo os atributos ou variáveis de instância
 public $nome;
 public $preco;
 public $categoria;

 // Método que retorna a categoria do item
 public function getCategoria(){
  return $this->categoria; // Note bem dentro de um método o uso de um atributo nunca leva o $
 }

 function setPreco($novoPreco){
  $this->preco = $novoPreco;
 }

 function getPreco(){
  return $this->preco;
 }
}
?>