<?php
class ItemInformatica
{
 /*
 Na classificação se for de valor:
  1 = Hardaware;
  2 = Software;
 */
 private $nome, $classificacao, $precoVenda;

 function __construct()
 {
  $this->nome = $_POST['nome'];
  $this->classificacao = $_POST['classificacao'];
  $this->precoVenda = $_POST['precoVenda'];
 }

 function exibirDetalhes()
 {
   $desconto = $this->calculaDesconto(); 
   echo "<p> Dados atualizados do item cadastrado, após o desconto: <br>
   Nome = $this->nome <br>
   Classificação = " . $this->classifica() . " <br>
   Preço de venda = R$" . number_format($this->precoVenda, 1, ',') . " <br>
   Valor de desconto =  R$$desconto <br> 
   Valor final = R$" . $this->precoVenda-$desconto;
 }

 function classifica()
 {
  $textoClassificacao = "";
  if ($this->classificacao == 1){
   $textoClassificacao = "Hardware";
  }else{
   $textoClassificacao = "Software";
  }
  return $textoClassificacao;
 }

 function calculaDesconto(){
  if ($this->classificacao == 1){
  return $this->precoVenda * 0.05;
  }else{
   return $this->precoVenda * 0.07;
  }
 }
}
