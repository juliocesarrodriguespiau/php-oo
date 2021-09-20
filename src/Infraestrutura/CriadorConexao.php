<?php

namespace Julio\Comercial\Infraestrutura;

use PDO;
use PDOException;

class CriadorConexao
    {
        public static function criarConexao(): PDO
        {
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=db_comercial', 'root', 'root');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch(PDOException $excecao){
                echo 'ERRO: ' . $excecao->getMessage();
            }
        }
    }