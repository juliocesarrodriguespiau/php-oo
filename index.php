<?php

require_once 'autoload.php';

use Julio\Comercial\Infraestrutura\CriadorConexao;
use Julio\Comercial\Infraestrutura\Repository\PdoRepositorioProduto;
use Julio\Comercial\Model\Produto;

echo "<pre>";

    $repositorio = new PdoRepositorioProduto(CriadorConexao::criarConexao());
    var_dump($repositorio);

    $produto1 = new Produto(NULL, "Tablet", 3000.12);
    var_dump($produto1);

echo "</pre>";