<?php

    namespace Julio\Comercial\Dominio\Model;

use DateTimeInterface;

class Cliente extends Pessoa
    {
        //private string $dataNascimento;
        private float $renda;

        public function __construct(string $nome, DateTimeInterface $dataNascimento, Endereco $endereco, float $renda)
        {
            parent::__construct($nome, $dataNascimento, $endereco);
            $this->dataNascimento = $dataNascimento;
            $this->renda = $renda;
        }

        // public function getDataNascimento(): string
        // {
        //     return $this->dataNascimento;
        // }

        // public function setDataNascimento(string $dataNascimento): void
        // {
        //     $this->dataNascimento = $dataNascimento;
        // }

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
                    "<br>Idade: " . $this->idade() . " anos." .
                    "<br>Nasc.: " . $this->getdataNascimento()->format('d/m/Y') .
                    "<br>Endereço: " . $this->endereco->getNomeLogradouro() . ", " . 
                    $this->endereco->getNumero() . " - " . $this->endereco->getBairro() . 
                    "<br>Data Nascimento: " . $this->dataNascimento . 
                    "<br>Renda R$ " . $this->renda . 
                    "</p>";
        }

    }