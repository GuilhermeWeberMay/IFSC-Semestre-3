package br.edu.ifsc.fln.controller;

import br.edu.ifsc.fln.model.domain.Pessoa;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;

import java.net.URL;
import java.util.ArrayList;
import java.util.List;
import java.util.Observable;
import java.util.ResourceBundle;

public class PessoaController implements Initializable {
    @FXML
    private ChoiceBox <String> cbSexo;

    @FXML
    private Spinner<Integer> sIdade;

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
        Pessoa pessoa = new Pessoa(
                tfNome.getText(),
                Byte.parseByte(tfIdade.getText()),
                Float.parseFloat(tfAltura.getText()),
                Float.parseFloat(tfPeso.getText()),
                cbSexo.getSelectionModel().getSelectedItem()
        );
        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("CALCULADORA IMC");
        alert.setHeaderText("Seu resultado!");
        alert.setContentText(pessoa.getDados());
        alert.showAndWait();
    }

    @FXML
    protected void btNovoImcOnClick() {
        tfNome.setText("");
        tfIdade.setText("");
        tfAltura.setText("");
        tfPeso.setText("");
    }

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        ObservableList<String> opcoes = FXCollections.observableArrayList("Feminino", "Masculino");

        cbSexo.setItems(opcoes);

        cbSexo.setValue("Masculino");


    }
}
