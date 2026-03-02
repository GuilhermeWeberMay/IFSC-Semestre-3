<?php
 class Livro{
  private $titulo, $autor, $isbn, $preco, $desconto;

  function __construct(){
   $formTitulo = $_POST["titulo"];
   $formAutor = $_POST["autor"];
   $formIsbn = $_POST["isbn"];
   $formPreco = $_POST["preco"];
   $formDesconto = $_POST["desconto"];

   // Atribuindo os dados do formulários as variaves de instância da classe
   $this->titulo = $formTitulo;
   $this->autor = $formAutor;
   $this->isbn = $formIsbn;
   $this->preco = $formPreco;
   $this->desconto = $formDesconto;
  }

  function calcularDesconto(){
   $desconto = $this->preco * ($this->desconto/100);
   $this->preco -= $desconto;
  }

  function superGet(){
   echo "<p> Dados atualizados do livro cadastrado, após o desconto: <br>
   Título = $this->titulo <br>
   Autor = $this->autor <br>
   ISBN = $this->isbn <br>
   Preço = R$$this->preco </p>";
  }

  // Getter e Setter - Título
    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    // Getter e Setter - Autor
    public function getAutor() {
        return $this->autor;
    }
    public function setAutor($autor) {
        $this->autor = $autor;
    }

    // Getter e Setter - ISBN
    public function getIsbn() {
        return $this->isbn;
    }
    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    // Getter e Setter - Preço
    public function getPreco() {
        return $this->preco;
    }
    public function setPreco($preco) {
        $this->preco = $preco;
    }

    // Getter e Setter - Desconto
    public function getDesconto() {
        return $this->desconto;
    }
    public function setDesconto($desconto) {
        $this->desconto = $desconto;
    }
 }
?>