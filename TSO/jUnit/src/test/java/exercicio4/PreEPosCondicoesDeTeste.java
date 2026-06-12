package exercicio4;

import org.junit.*;


public class PreEPosCondicoesDeTeste {
    @Before
    public void preCondicao(){
        System.out.println("Executou a pré condição");
    }
    @Test
    public void exibicaoPrePosCondicao_Teste1(){
        System.out.println("Executou o Teste 1");
    }
    @After
    public void finaliza(){
        System.out.println("Executou a finaliza");
    }
}
