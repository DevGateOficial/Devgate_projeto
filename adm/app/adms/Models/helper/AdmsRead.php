<?php

namespace App\adms\Models\helper;

use PDO;
use PDOException;

/**
 * Classe genérica para selecionar registro no banco de dados
 */
class AdmsRead extends AdmsConn
{
    /** @var string $select  */
    private string $select;

    /** @var array $values  */
    private array $values = [];
    
    /** @var array|null $result  */
    private array|null $result;

    /** @var object $query  */
    private object $query;

    /** @var object $conn  */
    private object $conn;

    /**
     * Retorna para quem intansciou a criação dos registros o resultado da ação. Se foi ou não possível
     * realiza-la.
     * 
     * @return array|null
     */
    public function getResult(): array|null
    {
        return $this->result;
    }

    /**
     * Undocumented function
     *
     * @param string $table
     * @param string|null|null $terms
     * @param string|null|null $parseString
     * @return void
     */
    public function executeRead(string $table, string|null $terms = null, string|null $parseString = null): void
    {
        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }

        $this->select = "SELECT * FROM {$table} {$terms}";

        $this->executeInstruction();
    }

    /**
     * Undocumented function
     *
     * @param string $query
     * @param string|null|null $parseString
     * @return void
     */
    public function fullRead(string $query, string|null $parseString = null): void
    {
        $this->select = $query;

        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }
        $this->executeInstruction();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function executeInstruction(): void
    {
        $this->connection();

        try {
            $this->executeParameter();
            $this->query->execute();
            $this->result = $this->query->fetchAll();
        } catch (PDOException $err) {
            $this->result = null;
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private function connection(): void
    {
        $this->conn = $this->connectDb();
        $this->query = $this->conn->prepare($this->select);
        $this->query->setFetchMode(PDO::FETCH_ASSOC);
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    private function executeParameter(): void
    {
        if ($this->values) {
            foreach ($this->values as $link => $value){ 
                if (($link == 'limit') or ($link == 'offset') or ($link == 'idUsuario')) {
                    $value = (int) $value;
                }

                $this->query->bindValue(":{$link}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
}
