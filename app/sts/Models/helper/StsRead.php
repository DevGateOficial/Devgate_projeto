<?php

    namespace Sts\Models\helper;

     // Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
     if(!defined('D3V3G4T3')){
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    use PDO;
use PDOException;

    /**
     * Helper responsável em buscar os registros no banco de dados
     */
    class StsRead extends StsConn{

        private string $select;
        private array|null $result = [];
        private object $conn;
        private object $query;

        function getResult(): array|null
        {

            return $this->result;
        }

        public function executeRead(string $table, $terms = null, $parseString = null)
        {
            //var_dump($table);
            $this->select = "SELECT * FROM {$table}";
            //var_dump($this->select);

            $this->executeInstruction();
        }

        private function executeInstruction()
        {
            $this->connection();

            try{
                $this->query->execute();
                $this->result = $this->query->fetchAll();
            }
            catch(PDOException $err){
                $this->result = null;
            }
        }

        private function connection()
        {
            $this->conn = $this->connectDb();
            $this->query = $this->conn->prepare($this->select);
            $this->query->setFetchMode(PDO::FETCH_ASSOC);
        }
    }