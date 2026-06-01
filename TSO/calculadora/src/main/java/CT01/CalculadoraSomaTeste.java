package CT01;

import org.junit.jupiter.api.Test;

public class CalculadoraSomaTeste {
    @Test
    void testeSomaInt(){
        CalculadoraSoma soma = new CalculadoraSoma();
        int resultado = soma.soma(2,2);
        assert (resultado == 4);
    }
    @Test
    void testeSomaFloat(){
        CalculadoraSoma soma = new CalculadoraSoma();
        float resultado = soma.soma(2.5f,2.8f);
        assert (resultado == 5.3f);
    }
    @Test
    void testeSomaLong(){
        CalculadoraSoma soma = new CalculadoraSoma();
        long resultado = soma.soma(Long.MAX_VALUE,Long.MIN_VALUE);
        assert (resultado == -1);
    }
}
