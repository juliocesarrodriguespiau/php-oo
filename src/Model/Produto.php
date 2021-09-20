<?php

    namespace Julio\Comercial\Model;
    
    //classe modelo entity - representa uma entidade.
    class Produto
    {
        private ?int    $idProduto;
        private string  $nomeProduto;
        private float   $precoProduto;

        public function __construct(?int $idProduto, string $nomeProduto, float $precoProduto)
        {
            $this->idProduto    = $idProduto;
            $this->nomeProduto  = $nomeProduto;
            $this->precoProduto = $precoProduto;
        }

        public function getIdProduto(): ?int
        {
            return $this->idProduto;
        }

        public function setIdProduto(?int $idProduto): void
        {
            $this->IdProduto = $idProduto;
        }

        public function getNomeProduto(): string
        {
            return $this->nomeProduto;
        }

        public function setNomeProduto($nomeProduto): void
        {
            $this->nomeProduto = $nomeProduto;
        }

        public function getPrecoProduto(): float
        {
            return $this->precoProduto;
        }

        public function setPrecoProduto($precoProduto): void
        {
            $this->precoProduto = $precoProduto;
        }
    }