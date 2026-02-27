import lombok.AllArgsConstructor;
import lombok.EqualsAndHashCode;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import lombok.ToString;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@ToString
@EqualsAndHashCode
public class ContaCorrentePessoaFisica extends ContaCorrente implements Imprimivel {
    private String cpf;


    @Override
    public String apresentar() {
        StringBuilder info = new StringBuilder();
        info.append(super.apresentar());
        info.append("ContaCorrentePessoaFisica");
        return info.toString();
    }

    @Override
    public void imprimir() {
        System.out.println("ContaCorrentePessoaFisica ");
    }
}
