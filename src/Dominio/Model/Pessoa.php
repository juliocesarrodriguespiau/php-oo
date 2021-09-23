<?php

    namespace Julio\Comercial\Dominio\Model;

    use DateTimeInterface;

    //require_once 'src/Model/AcessoAtributos.php';
    require_once 'autoload.php';

    abstract class Pessoa 
    {
        use AcessoAtributos;
        // ATRIBUTOS = $variáveis
        // Ideal definir sempre os atributos privados e 
        // na aplicação definir os métodos de alteração e exibição desses dados.
        protected string      $nome;
        protected DateTimeInterface $dataNascimento;
        protected Endereco    $endereco; // ASSOCIAÇÃO Pessoa "tem um" Endereco.
        protected float       $desconto; // pode ser acessado na classe mãe e modificado nas calasses filhas.
        private static int    $numDePessoas = 0;

        // COMPORTAMENTOS, MÉTODOS = funções - function
        public function __construct(string $nome, DateTimeInterface $dataNascimento, Endereco $endereco)
        {
            $this->nome = $nome;
            $this->dataNascimento = $dataNascimento;
            //$this->idade = $idade;
            //$this->validaIdade($idade);
            $this->endereco = $endereco;
            $this->setDesconto(); // definindo desconto
            self::$numDePessoas++; // igual a: Pessoa::$numDePessoas++;
        }

        // MÉTODO DESTRUTOR
        public function __destruct()
        {
            self::$numDePessoas--;
        }

        // METODOS ACESSORES - OS MÉTODOS QUE DÃO ACESSO GET - PEGA, SET - SETA OU EDITA
        // GET - PEGA
        public function getNome(): string
        {
            return $this->nome;
        }

        public function getdataNascimento(): DateTimeInterface
        {
            return $this->dataNascimento;
        }

        // SET - SETA OU EDITA
        public function setNome(string $nome): void
        {
            $this->nome = $nome;
        }

        public function setdataNascimento(DateTimeInterface $dataNascimento): void
        {
            $this->dataNascimento = $dataNascimento;
        }

        // MÉTODO STATICO
        public static function getNumDePessoas(): int
        {
            return self::$numDePessoas;
        }

        //MÉTODO ESPECIAL OU ESCÍFICO
        // private function validaIdade(int $idade): void
        // {
        //     if ($this->idade > 0 && $this->idade < 120) {
        //         $this->idade = $idade;
        //     } else {
        //         echo "Idade não permitida";
        //         exit;
        //     }
        // }

        // método idade() responsável por calcular a idade
        // retorna um dado do tipo inteiro, 
        // utilizando o diff para calcular a idade através da data getDataNascimento
        // e data atual ->diff(new \DateTimeImutable) 
        // apresentando o ano ->y;
        public function idade() {
            return $this->getdataNascimento()
                ->diff(new \DateTimeImmutable())
                ->y;
        }

        //método abstrato. Quem herdar de Pessoa, vai ser obrigado a implementar esse método.
        public function getDesconto(): float
        {
            return $this->desconto;
        }

        protected abstract function setDesconto(): void;

        public abstract function __toString(): string;

    }