package br.edu.ifsc.fln.controller;

import br.edu.ifsc.fln.model.domain.Pessoa;
import javafx.beans.value.ChangeListener;
import javafx.beans.value.ObservableValue;
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
    private Slider sliderIdade;

    @FXML
    private TextField tfAltura;

    @FXML
    private TextField tfIdade;

    @FXML
    private TextField tfNome;

    @FXML
    private TextField tfPeso;

    @FXML
    private Label labelMostraIdade;

    @FXML
    protected void btCalcularOnClick() {
        Pessoa pessoa = new Pessoa(
                tfNome.getText(),
                (int) sliderIdade.getValue(),
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
        tfAltura.setText("");
        tfPeso.setText("");
        sliderIdade.setValue(50);
        labelMostraIdade.setText("");
    }

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        ObservableList<String> opcoes = FXCollections.observableArrayList("Feminino", "Masculino");
        cbSexo.setItems(opcoes);
        cbSexo.setValue("Masculino");

        //Label - Mostrar Idade
        sliderIdade.valueProperty().addListener(new ChangeListener<Number>() {
            @Override
            public void changed(ObservableValue<? extends Number> observable, Number oldValue, Number newValue) {
                int idade = (int) sliderIdade.getValue();
                labelMostraIdade.setText(Integer.toString(idade));
            }
        });


    }
}
