<?php
class ContaBancaria{
 private $saldo;

 function __construct($saldo){
  $this->saldo = $saldo;
 }

 function depositar ($valorDeposito){
  $this->saldo += $valorDeposito;
 }

 function sacar ($valorSaque){
  if ($this->saldo < $valorSaque){
   echo "<p> Saque não é possivel valor em conta é menor que o valor que você quer sacar. ";
  }else{
   $this->saldo -= $valorSaque;
  }
 }

 function getSaldo(){
  return $this->saldo;
 }
}
?>