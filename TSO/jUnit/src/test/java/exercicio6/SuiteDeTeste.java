package exercicio6;

import br.edu.ifsc.fln.Pessoa;
import exercicio1.MeuPrimeiroTeste;
import exercicio2.ValidacaoVerdadeiroFalso;
import exercicio3.validacaoIgualdade;
import exercicio4.PreEPosCondicoesDeTeste;
import org.junit.runner.RunWith;
import org.junit.runners.Suite;

@RunWith(Suite.class)
@Suite.SuiteClasses({
        MeuPrimeiroTeste.class,
        ValidacaoVerdadeiroFalso.class,
        validacaoIgualdade.class,
        PreEPosCondicoesDeTeste.class,
        Pessoa.class
})
public class SuiteDeTeste {

}
