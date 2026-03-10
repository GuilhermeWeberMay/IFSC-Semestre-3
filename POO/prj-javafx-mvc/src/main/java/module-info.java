module br.edu.ifsc.fln.prjjavafxmvc {
    requires javafx.controls;
    requires javafx.fxml;
    requires static lombok;


    opens br.edu.ifsc.fln to javafx.fxml;
    exports br.edu.ifsc.fln;

    opens br.edu.ifsc.fln.controller to javafx.fxml;
    exports br.edu.ifsc.fln.controller;
}