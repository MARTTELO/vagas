<?php

namespace App\Db;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    /**
     * Host do banco de dados.
     *
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do banco de dados.
     *
     * @var string
     */
    const NAME = 'wdev_vagas';

    /**
     * Usuário do banco de dados.
     *
     * @var string
     */
    const USER = 'root';

    /**
     * Senha do banco de dados.
     *
     * @var string
     */
    const PASS = '';

    /**
     * Nome da tabela a ser manipulada.
     *
     * @var string
     */
    private $table;

    /**
     * Instância de conexão com o banco de dados.
     *
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia a conexão.
     *
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar a conexão com o banco de dados.
     *
     * @return void
     */
    public function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("Erro no sistema: " . $e->getMessage() . " em " . $e->getFile() . " na linha " . $e->getLine());

            echo "Ops! Ocorreu um problema interno. Já notificamos nossa equipe e estamos trabalhando para resolver. Por favor, tente novamente mais tarde.";
            die;
        }
    }

    /**
     * Insere os dados na tabela.
     *
     * @param array $values
     * @return string
     */
    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    /**
     * Executa uma consulta no banco.
     *
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*'): PDOStatement
    {
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($query);
    }

    /**
     * Atualiza os dados da tabela.
     *
     * @param string $where
     * @param array $values
     * @return bool
     */
    public function update($where, $values)
    {
        $fields = array_keys($values);
        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

        $this->execute($query, array_values($values));

        return true;
    }

    /**
     * Exclui registros da tabela.
     *
     * @param string $where
     * @param array $params
     * @return bool
     */
    public function delete($where, $params = [])
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $this->execute($query, $params);

        return true;
    }

    private function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;
        } catch (PDOException $e) {
            error_log("Erro no sistema: " . $e->getMessage() . " em " . $e->getFile() . " na linha " . $e->getLine());

            echo $e->getMessage();
            echo $e->getFile();
            echo $e->getLine();
            echo "Ops! Ocorreu um problema interno. Já notificamos nossa equipe e estamos trabalhando para resolver. Por favor, tente novamente mais tarde.";
            die;
        }
    }
}