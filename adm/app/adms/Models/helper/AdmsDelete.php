<?php

namespace App\adms\Models\helper;

use PDO;
use PDOException;

class AdmsDelete extends AdmsConn
{

    /** @var string $table Recebe o nome da tabela no banco de dados*/
    private string $table;

    /** @var string $id Recebe o id do registro que deve ser deletado do banco de dados*/
    private string $id;

    /** @var string|null $result Retorna os dados*/
    private string|null $result;

    /** @var object $delete Recebe a query preparada*/
    private object $delete;

    /** @var string $query Recebe a QUERY*/
    private string $query;

    /** @var object $conn Receba a conexão com o banco de dados*/
    private object $conn;

    /**
     * Retorna para quem intansciou a criação dos registros o resultado da ação. Se foi ou não possível
     * realiza-la.
     *
     * @return string|null
     */
    function getResult(): string|null 
    {
        return $this->result;
    }

    /**
     * Recebe a tabela e os dados a serem excluídos do banco de dados.
     *
     * @param string $table
     * @param array $data
     * @return void
     */
    public function executeDelete(string $table, array $id): void
    {
        $this->table = $table;
        $this->id = $id;
        $this->executeReplaceValues();
    }

    /**
     * Cria a QUERY e os links da mesma
     * São utilizadas as funções para transformar as informações do $data em links, para serem adicionados à QUERY
     *
     * @return void
     */
    private function executeReplaceValues(): void
    {
        $columns =  implode(', ' , array_keys($this->data));
        $values = ':' . implode(', :' , array_keys($this->data));
        $this->query = "DELETE FROM {$this->table} WHERE {$this->column} = {$this->data} ";

        $this->executeInstruction();
    }

    /**
     * Executa a QUERY
     * Se executado corretamente, retorna o ultimo Id inserido, caso contrário retorna null.
     *
     * @return void
     */
    private function executeInstruction(): void 
    {
        $this->connection();
        try{
            $this->insert->execute($this->data);
            $this->result = $this->conn->lastInsertId();
        }catch(PDOException $err){
            $this->result = null;
        }
    }

    /**
     * Recebe a conexão com o banco de dados da classe pai "Conn".
     * Prepara uma instrução para execução e retorna um objeto de instrução.
     *
     * @return void
     */
    private function connection(): void
    {
        $this->conn = $this->connectDb();
        $this->insert = $this->conn->prepare($this->query);
    }
}
