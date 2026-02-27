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
public abstract class ContaCorrente implements Imprimivel{

    private double saldo;
    private int numeroConta;
    private String titular;

    public String apresentar(){
        StringBuilder info = new StringBuilder();

        info.append("ContaCorrente");

        return info.toString();
    }
}
