package CT02;

import org.junit.jupiter.api.Test;

public class PessoaTeste {
    Pessoa p = new Pessoa(123L,"Guilherme", "Weber May", "24/10/2006");
    @Test
    void teste() {
        assert (p.getNome().equals("Guilherme"));
        assert (p.getSobrenome().equals("Weber May"));
        assert (p.getDataNascimento().equals("24/10/2006"));
        assert (p.getRg() == 123L);
    }

    Pessoa p1 = new Pessoa(321L,"Guilherme", "Weber May", 24,10,2006);
    @Test
    void teste2() {
        assert (p1.getNome().equals("Guilherme"));
        assert (p1.getSobrenome().equals("Weber May"));
        assert (p1.getRg() == 321L);
        assert (p1.getDataNascimentoObjeto().getDia() == 24);
        assert (p1.getDataNascimentoObjeto().getMes() == 10);
        assert (p1.getDataNascimentoObjeto().getAno() == 2006);
    }
}
