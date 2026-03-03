package br.edu.ifsc.fln.prjjavafx1;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;

public class HelloApplication extends Application {
    @Override
    public void start(Stage stage) throws IOException {
        FXMLLoader fxmlLoader = new FXMLLoader(HelloApplication.class.getResource("hello-view.fxml"));
        Scene scene = new Scene(fxmlLoader.load(), 400, 400);
        stage.setTitle("Título da página!");
        stage.setScene(scene);
        stage.show();
//        stage.setOpacity(0.01); Só funciona com parametro entre 0 e 1 e quanto mais baixo mais invisivel
    }
}
