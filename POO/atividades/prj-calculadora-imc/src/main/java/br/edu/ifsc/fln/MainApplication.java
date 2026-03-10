package br.edu.ifsc.fln;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;

public class MainApplication extends Application {
    @Override
    public void start(Stage stage) throws IOException {
        FXMLLoader fxmlLoader = new FXMLLoader(MainApplication.class.getResource("view/calculoImc-view.fxml"));
        Scene scene = new Scene(fxmlLoader.load(), 400 ,400);
        stage.setTitle("Calculadora IMC - Guilherme W. May");
        stage.setScene(scene);
        stage.show();
    }
}
