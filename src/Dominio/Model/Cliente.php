<?php

    namespace Julio\Comercial\Dominio\Model;

    class Cliente extends Pessoa
    {
        private string $dataNascimento;
        private float $renda;

        public function __construct(string $nome, int $idade, Endereco $endereco, string $dataNascimento, float $renda)
        {
            parent::__construct($nome, $idade, $endereco);
            $this->dataNascimento = $dataNascimento;
            $this->renda = $renda;
        }

        public function getDataNascimento(): string
        {
            return $this->dataNascimento;
        }

        public function setDataNascimento(string $dataNascimento): void
        {
            $this->dataNascimento = $dataNascimento;
        }

        public function getRenda(): float
        {
            return $this->renda;
        }

        public function setRenda($renda): void
        {
            $this->renda = $renda;
        }

        // IMPLEMENTAÇÃO DO MÉTODO ABSTRATO setDesconto().
        public function setDesconto(): void
        {
            $this->desconto = 0.05;
        }

        //SOBRESCRITA DE MÉTODO ou SOBRESCREVER - POLIMORFISMO
        public function __toString(): string
        {
            return  "<p>Nome: " . $this->nome . 
                    "<br>Idade: " . $this->idade . " anos." .
                    "<br>Endereço: " . $this->endereco->getNomeLogradouro() . ", " . 
                    $this->endereco->getNumero() . " - " . $this->endereco->getBairro() . 
                    "<br>Data Nascimento: " . $this->dataNascimento . 
                    "<br>Renda R$ " . $this->renda . 
                    "</p>";
        }

    }