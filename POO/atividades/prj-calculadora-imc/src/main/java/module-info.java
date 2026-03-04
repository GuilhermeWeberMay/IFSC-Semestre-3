module br.edu.ifsc.fln.prjcalculadoraimc {
    requires javafx.controls;
    requires javafx.fxml;


    opens br.edu.ifsc.fln.prjcalculadoraimc to javafx.fxml;
    exports br.edu.ifsc.fln.prjcalculadoraimc;
}