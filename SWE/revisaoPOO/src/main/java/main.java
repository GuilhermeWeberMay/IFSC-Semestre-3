public class main {
    public static void main(String[] args) {
//        ContaCorrente c1 = new ContaCorrente();
//        ContaCorrente c2 = new ContaCorrente(1000, 10, "Guilherme");

        ContaCorrente cpf = new ContaCorrentePessoaFisica();
        ContaCorrentePessoaJuridica cnpj = new ContaCorrentePessoaJuridica();

        System.out.println(cpf.apresentar());
        System.out.println(cnpj.apresentar());

        cpf.imprimir();
        cnpj.imprimir();

    }
}
