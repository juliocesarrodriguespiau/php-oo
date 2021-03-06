<?php

    namespace Julio\Comercial\Dominio\Repository;

    use Julio\Comercial\Dominio\Model\Produto;

    //interface que representa todo Repository e seus métodos.
    interface RepositorioProdutos
    {

        public function todosProdutos(): array;
        public function salvar(Produto $produto): bool;
        public function createProduto(Produto $produto): bool;
        public function readProduto(Produto $produto): array;
        public function updateProduto(Produto $produto): bool;
        public function deleteProduto(Produto $produto): bool;
        
    }
