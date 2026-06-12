package exercicio1;

import org.junit.*;

public class MeuPrimeiroTeste {
    @Test
    public void teste1(){
        System.out.println("Teste 1 executado.");
    }
    @Test
    public void teste2(){
        System.out.println("Teste 2 executado.");
    }
    public void naoEUmTeste(){
        System.out.println("Este mensagem não deve aparecer!");
    }
}
