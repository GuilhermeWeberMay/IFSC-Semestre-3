package br.edu.ifsc.fln.model.domain;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.Setter;

@Getter
@Setter
@AllArgsConstructor
public class Pessoa {
    private String nome;
    private int idade;
    private float altura;
    private float peso;
    private String sexo;

    public float calculaImc(){
        return this.peso/(this.altura *  this.altura);
    }

    public String getDados(){
        float imc = this.calculaImc();
        StringBuilder dados = new StringBuilder();
        dados.append("Nome: " + this.getNome()).append("\n");
        dados.append("Idade: " + this.getIdade()).append("\n");
        dados.append("Altura: " + this.getAltura()).append("\n");
        dados.append("Peso: " + this.getPeso()).append("\n");
        dados.append("Sexo: " + this.getSexo()).append("\n");
        dados.append("IMC: " +String.format("%.2f",imc)).append("\n");
        dados.append("Classificação: " + classificaImc(imc)).append("\n");

        return dados.toString();
    }

    private String classificaImc(float imc) {
        String mensagem = "Erro no calculo";
        if (imc < 18.5 ){
            mensagem = "Baixo peso";
        }else if ( imc < 24.9 ){
            mensagem = "Peso adequado";
        }else if ( imc < 29.9 ){
            mensagem = "Sobrepeso";
        }else if ( imc < 34.9 ){
            mensagem = "Obesidade grau I";
        } else if (imc < 39.9) {
            mensagem = "Obesidade grau II";
        }else {
            mensagem = "Obesidade extrema";
        }
        return mensagem;
    }
}
