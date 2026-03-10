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
    private byte qtdDependentes;

    public double calcularSalario(){
        return salarioBase + qtdDependentes * 300;
    }

    public String getDados(){
        StringBuilder dados = new StringBuilder();
        dados.append("Nome: ").append(nome).append("\n").append("Salario: R$").append(salarioBase).append("\n").
                append("Quantidade dependentes: ").append(qtdDependentes).append("\n").append("Salario Liquido: R$").append(String.format("%.2f", this.calcularSalario()));


        return dados.toString();
    }
}

