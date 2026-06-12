import java.util.Scanner;

public class TesteCauculadora {
    public static void main(String[] args) {
        Calculadora calc = new Calculadora();
        System.out.println("Resultados:");
        System.out.println("Soma         : "+calc.somar(4, 8));
        System.out.println("Subtração    : "+calc.subtrair(24, 12));
        System.out.println("Multiplicação: "+calc.multiplicar(2, 6));
        System.out.println("Divisão      : "+calc.dividir(120, 10));

        System.out.println("\nResultados com erros: ");
        System.err.println("Soma         : "+calc.somar(4, 8));
        System.err.println("Subtração    : "+calc.subtrair(24, 12));
        System.err.println("Multiplicação: "+calc.multiplicar(2, 6));
        System.err.println("Divisão      : "+calc.dividir(120, 10));
    }
}
