import lombok.AllArgsConstructor;
import lombok.EqualsAndHashCode;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import lombok.ToString;

@Getter
@Setter
@ToString
@NoArgsConstructor
@EqualsAndHashCode
public class ContaCorrentePessoaJuridica extends ContaCorrente implements Imprimivel{


    @Override
    public String apresentar() {
        StringBuilder info = new StringBuilder();
        info.append(super.apresentar());
        info.append("ContaCorrentePessoaJuridica ");
        return info.toString();
    }

    @Override
    public void imprimir() {
        System.out.println("ContaCorrentePessoaJuridica ");
    }
}
