<?php

    namespace Julio\Comercial\Dominio\Model;

    //require_once 'AcessoAtributos.php';
    require_once 'autoload.php';

    class Endereco
    {
        use AcessoAtributos; // trait AcessoAtributos - como se o php colasse aquele codigo aqui pra dentro.

        private string $uf;
        private string $cidade;
        private string $nomeLogradouro;
        private string $numero;
        private string $bairro;
        private string $cep;

        public function __construct(string $uf, string $cidade, string $nomeLogradouro, string $numero, string $bairro, string $cep)
        {
            $this->uf               = $uf;
            $this->cidade           = $cidade;
            $this->nomeLogradouro   = $nomeLogradouro;
            $this->numero           = $numero;
            $this->bairro           = $bairro;
            $this->cep              = $cep;
        }

        public function getUF(): string
        {
            return $this->uf; // retorne-me de uma entidade desta classe a unidade federativa dela.
        }

        public function setUF(string $uf): void
        {
            $this->uf = $uf; // a instancia da minha classe Encdereco, que estiver chamando esse método, no seu atributo $uf, vai receber a UF repassada no setUF(string $uf)
        }

        public function getCidade(): string
        {
            return $this->cidade;
        }

        public function setCidade(string $cidade):  void
        {
            $this->cidade = $cidade;
        }

        public function getNomeLogradouro(): string
        {
            return $this->nomeLogradouro;
        }

        public function setNomeLogradouro(string $nomeLogradouro): void
        {
            $this->nomeLogradouro = $nomeLogradouro;
        }

        public function getNumero(): string
        {
            return $this->numero;
        }

        public function setNumero(string $numero): void
        {
            $this->numero = $numero;
        }

        public function getBairro(): string
        {
        return $this->bairro;
        }

        public function setBairro(string $bairro): void
        {
            $this->bairro = $bairro;
        }

        public function getCep(): string
        {
            return $this->cep;
        }

        public function setCep(string $cep): void
        {
            $this->cep = $cep;
        }
    }