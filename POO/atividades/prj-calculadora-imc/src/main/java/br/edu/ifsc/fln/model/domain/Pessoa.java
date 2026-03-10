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

    public float calculaImc(){
        return this.peso/(this.altura *  this.altura);
    }
}
