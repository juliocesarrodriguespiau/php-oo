<?php

require_once 'autoload.php';

use Julio\Comercial\Infraestrutura\CriadorConexao;
use Julio\Comercial\Model\Produto;

echo "<pre>";

    $conexao = CriadorConexao::criarConexao();
    var_dump($conexao);

    $produto1 = new Produto(NULL, "Tablet", 3000.12);
    var_dump($produto1);

echo "</pre>";