<?php

    namespace Julio\Comercial\Model;

    //require_once 'src/Model/AcessoAtributos.php';
    require_once 'autoload.php';

    abstract class Pessoa 
    {
        use AcessoAtributos;
        // ATRIBUTOS = $variáveis
        // Ideal definir sempre os atributos privados e 
        // na aplicação definir os métodos de alteração e exibição desses dados.
        protected string      $nome;
        protected int         $idade;
        protected Endereco    $endereco; // ASSOCIAÇÃO Pessoa "tem um" Endereco.
        protected float       $desconto; // pode ser acessado na classe mãe e modificado nas calasses filhas.
        private static int    $numDePessoas = 0;

        // COMPORTAMENTOS, MÉTODOS = funções - function
        public function __construct(string $nome, int $idade, Endereco $endereco)
        {
            $this->nome = $nome;
            $this->idade = $idade;
            $this->validaIdade($idade);
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

        public function getIdade(): int
        {
            return $this->idade;
        }

        // SET - SETA OU EDITA
        public function setNome(string $nome): void
        {
            $this->nome = $nome;
        }

        public function setIdade(string $idade): void
        {
            $this->idade = $idade;
        }

        // MÉTODO STATICO
        public static function getNumDePessoas(): int
        {
            return self::$numDePessoas;
        }

        //MÉTODO ESPECIAL OU ESCÍFICO
        private function validaIdade(int $idade): void
        {
            if ($this->idade > 0 && $this->idade < 120) {
                $this->idade = $idade;
            } else {
                echo "Idade não permitida";
                exit;
            }
        }

        //método abstrato. Quem herdar de Pessoa, vai ser obrigado a implementar esse método.
        public function getDesconto(): float
        {
            return $this->desconto;
        }

        protected abstract function setDesconto(): void;

        public abstract function __toString(): string;

    }