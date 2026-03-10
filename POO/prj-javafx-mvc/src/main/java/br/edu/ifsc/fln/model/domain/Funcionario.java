package br.edu.ifsc.fln.model.domain;

import lombok.*;

@Setter
@Getter
@EqualsAndHashCode
@ToString
@AllArgsConstructor
public class Funcionario {
    private String nome;
    private float salarioBase;
    private byte numeroDependentes;

    private float calcularSalario(){
        return salarioBase + numeroDependentes * 300;
    }
}

