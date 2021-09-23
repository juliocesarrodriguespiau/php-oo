<?php

require_once 'autoload.php';

use Julio\Comercial\Infraestrutura\CriadorConexao;
use Julio\Comercial\Infraestrutura\Repository\PdoRepositorioProduto;
use Julio\Comercial\Dominio\Model\Produto;

use Julio\Comercial\Dominio\Model\Cliente;
use Julio\Comercial\Dominio\Model\Endereco;
use Julio\Comercial\Dominio\Model\Funcionario;
use Julio\Comercial\Dominio\Model\Pessoa;

echo "<pre>";

    $repositorio = new PdoRepositorioProduto(CriadorConexao::criarConexao());
    var_dump($repositorio);

    $produto1 = new Produto(1, "Tablet", 3000);
    $produto2 = new Produto(2, "Notebook", 4000);
    $produto3 = new Produto(3, "Mouse", 150);
    $produto4 = new Produto(4, "Teclado Mecânico", 450);
    $produto5 = new Produto(5, "Fone de Ouvido", 500);
    $produto6 = new Produto(6, "Cadeira", 1200);
    $produto7 = new Produto(7, "Mouse Pad", 100);


    //var_dump($produto1);

    $repositorio->salvar($produto1);
    $repositorio->salvar($produto2);
    $repositorio->salvar($produto3);
    $repositorio->salvar($produto4);
    $repositorio->salvar($produto5);
    $repositorio->salvar($produto6);
    $repositorio->salvar($produto7);

    $repositorio->todosProdutos();
    

echo "</pre>";
