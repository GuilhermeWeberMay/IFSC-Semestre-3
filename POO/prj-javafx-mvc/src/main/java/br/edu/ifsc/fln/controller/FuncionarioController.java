package br.edu.ifsc.fln.controller;

import br.edu.ifsc.fln.model.domain.Funcionario;
import javafx.fxml.FXML;
import javafx.scene.control.Alert;
import javafx.scene.control.TextField;

public class FuncionarioController {

    @FXML
    private TextField tfNome;

    @FXML
    private TextField tfQtdDependentes;

    @FXML
    private TextField tfSalarioBase;

    @FXML
    void btCalcularOnAction() {
        Funcionario funcionario = new Funcionario(
                tfNome.getText(),
                Float.parseFloat(tfSalarioBase.getText()),
                Byte.parseByte(tfQtdDependentes.getText())
        );

        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Dados do funcionario");
        alert.setHeaderText("Calculo do salario");
        alert.setContentText(funcionario.getDados() + "\n" + funcionario.calcularSalario());

        alert.showAndWait();
    }
}
