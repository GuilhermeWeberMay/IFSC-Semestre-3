<?php
class Carro
{
 private $fabricante, $modelo, $precoVenda;

 function __construct()
 {
  $this->fabricante = $_POST['fabricante'];
  $this->modelo = $_POST['modelo'];
  $this->precoVenda = $_POST['precoVenda'];
 }

 function exibirDetalhes()
 {
  if ($this->precoVenda <= 100000) {
   echo "<p> Dados atualizados do carro cadastrado, após o desconto: <br>
   Fabricante = $this->fabricante <br>
   Modelo = $this->modelo <br>
   Preço de venda = $this->precoVenda";
  } else {
   echo "<p> Seu carro é acima de popular então não conseguimos mostrar a informações. ";
  }
 }

 function classifica()
 {
  $mensagem = "";
  if ($this->precoVenda <= 100000) {
   $mensagem = "Carro popular";
  } else if ($this->precoVenda <= 300000) {
   $mensagem = "Carro performance intermediária";
  } else {
   $mensagem = "Carro alta performance";
  }
  return $mensagem;
 }
}
