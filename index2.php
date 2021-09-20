<?php

// PROGRAMAÇÃO ORIENTADA A OBJETOS
// Orientação a Objetos é um paradgma de programação
/*
Objetivo - abstrair "coisas" do mundo real em "objetos"
Cada objeto tem características e comportamentos
Características são os atributos = $variáveis
Comportamentos são os métodos = funções function(){return algo};

1º passo - abstrair o problema, modelando CLASSES de objetos
2º passo - criar as CLASSES, elas serão nossos modelos de objetos.

Temos que seguir várias regras de nomes, tabulações, indentações, etc.
*/

// require_once 'src/Model/Pessoa.php';
// require_once 'src/Model/Endereco.php';
// require_once 'src/Model/Funcionario.php';
// require_once 'src/Model/cliente.php';

require_once 'autoload.php';

use Julio\Comercial\Model\Pessoa;
use Julio\Comercial\Model\Endereco;
use Julio\Comercial\Model\Funcionario;
use Julio\Comercial\Model\Cliente;

$endereco1 = new Endereco("SP", "BEBEDOURO", "AV. MARIA DIAS", "1100 CASA 19", "JD STO ANTONIO", "14702-122");

// $pessoa1 = new Pessoa("Miguel José", 55, $endereco1); // isntanciar novo objeto é o mesmo que criar um novo obejeto do tipo pessoa
// $pessoa2 = new Pessoa("José Vicente", 30, $endereco1); // isntanciar novo objeto é o mesmo que criar um novo obejeto do tipo pessoa
// $pessoa3 = new Pessoa("Josefina", 34, $endereco1); // isntanciar novo objeto é o mesmo que criar um novo obejeto do tipo pessoa
//unset($pessoa3); // tirando a referencia ao objeto $pessoa3

echo "<pre>";
    
    echo "<hr>";
    
    $funcionario1 = new Funcionario("Edson", 30, $endereco1, "Desenvolvedor", 3000);
    var_dump($funcionario1);
    
    echo "<hr>";
    
    $cliente1 = new Cliente("Rosa Maria", 50, $endereco1, "19/09/2021", 2000);
    var_dump($cliente1);

    echo "<hr>";

    echo $funcionario1->__toString();
    
    echo "<hr>";

    echo $cliente1->__toString();

    $funcionario1->setSenha("123");

    $funcionario1->login("Edson", "123");

    echo $endereco1->nomeLogradouro;
    echo "<br>";
    echo $endereco1->bairro;

    echo "<p> $cliente1->nome </p>";
    echo "<p> $funcionario1->nome </p>";



echo "</pre>";
    
echo "<p>Número de Pessoas: ". Pessoa::getNumDePessoas()."</p>";

// como setar valores para os atributos de um objeto.
// $pessoa1->nome = "Miguel";
// $pessoa1->idade = 5;
// $pessoa2->nome = "Vicente";
// $pessoa2->idade = 3;

// como pegar ou escrever o conteúdo de um atributo.
// echo "<p>Nome: $pessoa1->nome </p>";
// echo "<p>Idade: $pessoa1->idade </p>";
// echo "<hr>";
// echo "<p>Nome: $pessoa2->nome </p>";
// echo "<p>Idade: $pessoa2->idade </p>";

// echo "<pre>";
//     var_dump($pessoa1,$pessoa2);    
// echo "<pre>";
// echo "<hr>";

// USAR METODOS ACESSORES
//$pessoa1->setNome("Julio Piau");
//$pessoa1->setIdade(41);

//$pessoa2->setNome("Joaquim Silva");
//$pessoa2->setIdade(30);

// echo "<p>Nome: {$pessoa1->getNome()} </p>";
// echo "<p>Idade: {$pessoa1->getIdade()} anos. </p>";
// echo "<hr>";
// echo "<p>Nome: {$pessoa2->getNome()} </p>";
// echo "<p>Idade: {$pessoa2->getIdade()} anos. </p>";
// echo "<hr>";
// echo "<p>Nome: {$pessoa3->getNome()} </p>";
// echo "<p>Idade: {$pessoa3->getIdade()} anos. </p>";
// echo "<hr>";

// echo "<pre>";
//     var_dump($pessoa1,$pessoa2, $pessoa3);    
// echo "<pre>";

