package br.edu.ifsc.fln.prjcalculadoraimc;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;

public class HelloController {
    @FXML
    private Button btCalcular;

    @FXML
    private Button btNovo;

    @FXML
    private TextField tfAltura;

    @FXML
    private TextField tfIdade;

    @FXML
    private TextField tfNome;

    @FXML
    private TextField tfPeso;

    @FXML
    protected void btCalcularOnClick() {
        float altura =  Float.parseFloat(tfAltura.getText());
        float peso = Float.parseFloat(tfPeso.getText());
        float imc = calcularImc(altura, peso);
        String classificacaoImc = classificaImc(imc);
        String formatada =  String.format("%.1f", imc);
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("CALCULADORA IMC");
        alert.setHeaderText("Seu resultado!");
        alert.setContentText("Nome:   " + tfNome.getText()   + "\n" +
                             "Idade:  " + tfIdade.getText()  + "\n" +
                             "Altura: " + tfAltura.getText() + "\n" +
                             "Peso:   " + tfPeso.getText()   + "\n\n" +
                             "IMC:    " + formatada          + "\n" +
                             "Classificação: " + classificacaoImc);
    alert.showAndWait();
    }

    @FXML
    protected void btNovoImcOnClick() {
        tfNome.setText("");
        tfIdade.setText("");
        tfAltura.setText("");
        tfPeso.setText("");
    }

    // Fiz esse método como private para outras classes não poderem acessar e calcular
    private float calcularImc (float altura, float peso){
        return peso / (altura * altura);
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
