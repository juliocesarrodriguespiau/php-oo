<?php

    namespace Julio\Comercial\Model;

    //require_once 'src/Model/Autenticar.php';
    require_once 'autoload.php';

    class Funcionario extends Pessoa implements Autenticar
    {
        private string $cargo;
        private float $salario;
        private string $senha;

        public function __construct(string $nome, int $idade, Endereco $endereco, string $cargo, float $salario)
        {
            parent::__construct($nome, $idade, $endereco);
            $this->cargo = $cargo;
            $this->salario = $salario;
        }

        public function getCargo(): string
        {
            return $this->cargo;
        }

        public function setCargo(string $cargo): void
        {
            $this->cargo = $cargo;
        }

        public function getSalario(): float
        {
            return $this->salario;
        }

        public function setSalario(float $salario): void
        {
            $this->salario = $salario;
        }

        // IMPLEMENTAÇÃO DO MÉTODO ABSTRATO setDesconto().
        public function setDesconto(): void
        {
            $this->desconto = 0.10;
        }

        //SOBRESCRITA DE MÉTODO ou SOBRESCREVER - POLMORFISMO
        public function __toString(): string
        {
            return  "<p>Nome: ".$this->nome . 
                    "<br>Idade: ".$this->idade . " anos." . 
                    "<br>Endereço: ".$this->endereco->getNomeLogradouro() . ", " . 
                    $this->endereco->getNumero() . " - " . $this->endereco->getBairro() . 
                    "<br>Cargo: " . $this->cargo .
                    "<br>Salário: R$ " . $this->salario .  
                    "</p>";
        }

        // IMPLEMENTAÇÃO DO MÉTODO LOGIN DA INTERFACE
        public function login($nome, $senha): void
        {
            if($this->nome === $nome && $this->senha === $senha){
                echo "<p> [LOGIN: Usuário: " . $this->nome . " SUCCESS AUTENTICATION!]  </p>";
            } else {
                echo "<p> [ERROR! UNSUCCESS AUTENTICATION!! USER OR PASSWORD INCORRECT!]";
            }
        }

        public function setSenha(string $senha): void
        {
            $this->senha = $senha;
        }
    }