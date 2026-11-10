<?php

namespace App\Entity;

use App\Db\Database;

class Vaga
{
    /**
     * Identificador único da vaga.
     *
     * @var int
     */
    public $id;

    /**
     * Título da vaga.
     *
     * @var string
     */
    public $titulo;

    /**
     * Descrição da vaga (pode conter HTML).
     *
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga está ativa (s) ou não (n).
     *
     * @var string
     */
    public $ativo;

    /**
     * Data de publicação da vaga.
     *
     * @var string
     */
    public $data;

    /**
     * Cadastra uma nova vaga no banco.
     *
     * @return bool
     */
    public function cadastrar(): bool
    {
        $this->data = date('Y-m-d H:i:s');

        if (empty($this->data)) {
            $this->data = date('Y-m-d H:i:s');
        }

        $objDatabase = new Database('vagas');
        $this->id = $objDatabase->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data,
        ]);

        echo "<pre>";
        print_r($this);
        echo "</pre>";

        return true;
    }

    public function editar(): bool
    {
        $this->data = date('Y-m-d H:i:s');

        return (new Database('vagas'))->update('id = ' . (int) $this->id, [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data,
        ]);
    }

    /**
     * Busca vagas com filtros opcionais.
     *
     * @return array
     */
    public static function getVagas($where = null, $order = null, $limit = null): array
    {
        $objDatabase = new Database('vagas');

        return $objDatabase->select($where, $order, $limit)->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    /**
     * Busca uma vaga pelo ID.
     *
     * @param int|string $id
     */
    public static function getVaga($id): ?Vaga
    {
        $vaga = (new Database('vagas'))
            ->select('id = ' . (int) $id)
            ->fetchObject(self::class);

        return $vaga instanceof Vaga ? $vaga : null;
    }

    public function excluir(): bool
    {
        return (new Database('vagas'))->delete('id = ' . (int) $this->id);
    }
}