<?php

    namespace Julio\Comercial\Infraestrutura\Repository;

    use Julio\Comercial\Dominio\Model\Produto;
    use Julio\Comercial\Dominio\Repository\RepositorioProdutos;
    use PDO;

    // classe que implementa a interface RepositorioPRodutos
    class PdoRepositorioProduto implements RepositorioProdutos
    {
        private PDO $conexao;

        //injeção de código com a dependência da conexão PDO para atuar.
        public function __construct(PDO $conexao)
        {
            $this->conexao = $conexao;
        }

        // retorna array com todosProdutos
        public function todosProdutos(): array
        {
            $sqlConsulta = "SELECT * FROM produto";
            $stmt = $this->conexao->query($sqlConsulta);

            return $this->hidratarListaProdutos($stmt);
        }

        public function salvar(Produto $produto): bool
        {
            if (empty($produto->getIdProduto())){
                return $this->createProduto($produto);
            }

            return $this->updateProduto($produto);
        }

        public function createProduto(Produto $produto): bool
        {
            $sqlInsert = "INSERT INTO produto (nomeProduto, precoProduto) VALUES (:nome, :preco);";
            $stmt = $this->conexao->prepare($sqlInsert);
            $stmt->bindValue(':nome', $produto->getIdProduto(), PDO::PARAM_STR);
            $stmt->bindValue(':preco', $produto->getPreco(), PDO::PARAM_STR);
            $sucesso = $stmt->execute();

            if ($sucesso) {
                $produto->setIdProduto($this->conexao->lastInsertId());
            }
            return $sucesso;
        }

        public function readProduto(Produto $produto): array
        {
            $sqlConsulta = "SELECT * FROM produto WHERE idProduto = :id;";
            $stmt = $this->conexao->prepare($sqlConsulta);
            $stmt->bindValue(':id', $produto->getIdProduto(), PDO::PARAM_INT);
            $stmt->execute();

            return $this->hidratarListaProdutos($stmt);
        }

        public function updateProduto(Produto $produto): bool
        {
            $sqlUpdate = "UPDATE produto SET nomeProduto = :nome, precoProduto = :preco WHERE idProduto = :id;";
            $stmt = $this->conexao->prepare($sqlUpdate);
            $stmt->bindValue(':nome', $produto->getNomeProduto(), PDO::PARAM_STR);
            $stmt->bindValue(':preco', $produto->getPreco(), PDO::PARAM_STR);
            $stmt->bindValue(':id', $produto->getIdProduto(), PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function deleteProduto(Produto $produto): bool
        {
            $stmt = $this->conexao->prepare('DELETE FROM produto WHERE idProduto = ?;');
            $stmt->bindValue(1, $produto->getIdProduto(), PDO::PARAM_INT);

            return $stmt->execute();
        }

        // HIDRATAR PRODUTOS
        public function hidratarListaProdutos(\PDOStatement $stmt): array
        {
            $listaDadosProdutos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $listaProdutos = [];

            echo "<table>";
            foreach ($listaDadosProdutos as $dadosProduto) {
                $listaProdutos[] = new Produto (
                    $dadosProduto['idProduto'],
                    $dadosProduto['nomeProduto'],
                    $dadosProduto['precoProduto']
                );
                echo"
                <tr>
                    <td width='20'>
                        {$dadosProduto['idProduto']}
                    </td>
                        
                    <td width='150'>
                        {$dadosProduto['nomeProduto']}
                    </td>
                    <td align='right'>
                    ".number_format($dadosProduto['precoProduto'], 2, ',' , '.')."
                    </td>
                </tr>";
            }
            echo "</table>";

            return $listaProdutos;
        }

    }