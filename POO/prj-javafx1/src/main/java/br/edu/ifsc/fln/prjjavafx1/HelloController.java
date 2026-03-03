package br.edu.ifsc.fln.prjjavafx1;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.CheckBox;
import javafx.scene.control.Label;
import javafx.scene.control.TextField;

public class HelloController {

    @FXML
    private Label lbNomeCompleto;

    @FXML
    private TextField tfNome;

    @FXML
    private TextField tfSobrenome;

    @FXML
    private TextField tfIdade;

    @FXML
    private CheckBox cbAbilitarEntrada;

    @FXML
    private Button btTchau;

//    @FXML
//    protected void onHelloButtonClick() {
//        welcomeText.setText("Hello World!");
//    }

    @FXML
    protected void btOnAction() {
        String nome = tfNome.getText();
        String sobrenome = tfSobrenome.getText();
        String mensagem;
        int idade = Integer.parseInt(tfIdade.getText());
        if (idade>=18) {
            mensagem = " Pessoa maior de idade";
        }else{
            mensagem = " Pessoa menor de idade";
        }

        String nomeCompleto = nome + " " + sobrenome + " " + mensagem;
        lbNomeCompleto.setText(nomeCompleto);
    }

    @FXML
    protected void btOnLimpar(){
        tfNome.setText("");
        tfSobrenome.setText("");
        lbNomeCompleto.setText("");
        tfNome.requestFocus();
    }

    @FXML
    void cbAbilitarEntradaOnAction(ActionEvent event) {
//        if (cbAbilitarEntrada.isSelected()) {
//            tfNome.setEditable(true);
//            tfSobrenome.setEditable(true);
//        }else{
//            tfNome.setEditable(false);
//            tfSobrenome.setEditable(false);
//        }
        tfNome.setEditable(cbAbilitarEntrada.isSelected());
        tfSobrenome.setEditable(cbAbilitarEntrada.isSelected());
    }

}
