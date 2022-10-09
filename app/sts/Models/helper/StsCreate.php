<?php

namespace Sts\Models\helper;

use PDO;
use PDOException;

// Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
if(!defined('D3V3G4T3')){
    //header("Location: /");
    die("Erro: Página não encontrada!");
}

class StsCreate extends StsConn
{
    private string $table;
    private array $data;
    private string|null $result = null;
    private object $insert;
    private string $query;
    private object $conn;

    function getResult(): string|null 
    {
        return $this->result;
    }

    public function executeCreate(string $table, array $data): void
    {
        $this->table = $table;
        var_dump($this->table);

        $this->data = $data;
        var_dump($this->data);

        $this->executeReplaceValues();
    }

    private function executeReplaceValues(): void
    {
        $columns =  implode(', ' , array_keys($this->data));
        // echo "<br>";
        // echo "<br>";
        // var_dump($columns);

        $values = ' :' . implode(', :' , array_keys($this->data));
        // echo "<br>";
        // echo "<br>";
        // var_dump($values);

        $this->query = "INSERT INTO {$this->table} ($columns) VALUES ($values)";
        echo "<br>";
        echo "<br>";
        var_dump($this->query);

        $this->executeInstruction();
    }

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

    private function connection(): void
    {
        $this->conn = $this->connectDb();
        $this->insert = $this->conn->prepare($this->query);
    }
}