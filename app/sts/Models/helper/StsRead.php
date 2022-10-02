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

        /** @var object $select Recebe a tabela que deve ser acessada no banco de dados*/
        private string $select;
        /** @var object $conn Receba a conexão com o banco de dados*/
        private object $conn;
        /** @var object $query Receba os resgistros do banco de dados*/
        private object $query;
        /** @var array|null $result Receba os dados da query os organizando em um array*/
        private array|null $result = [];

        private array $values = [];

        /**
         * Caso consiga obter os registros do banco de dados, os envia em formato de array
         * Caso não obtenha nenhum registro, retorna null
         *
         * @return array|null
         */
        function getResult(): array|null
        {
            return $this->result;
        }

        /**
         * Recebe a tabela a ser acessada no banco de dados e monsta a estrutura SQL para a pesquisa
         *
         * @param string $table
         * @param [type] $terms
         * @param [type] $parseString
         * @return void
         */
        public function executeRead(string $table, string|null $terms = null, string|null $parseString = null): void
        {
            //var_dump($table);
            //var_dump($this->select);

            if(!empty($parseString)){
                parse_str($parseString, $this->values);
            }

            $this->select = "SELECT * FROM {$table} {$terms}";

            $this->executeInstruction();
        }

        public function fullRead(string $query, string|null $parseString = null)
        {
            $this->select = $query;

            if(!empty($parseString)){
                parse_str($parseString, $this->values);
            }

            $this->executeInstruction();
        }

        /**
         * Undocumented function
         *
         * @return void
         */
        private function executeInstruction()
        {
            $this->connection();

            try{
                $this->executeParameter();
                $this->query->execute();
                $this->result = $this->query->fetchAll();
            }
            catch(PDOException $err){
                $this->result = null;
            }
        }

        /**
         * Recebe a conexão com o banco de dados
         *
         * @return void
         */
        private function connection(): void
        {
            $this->conn = $this->connectDb();
            $this->query = $this->conn->prepare($this->select);
            $this->query->setFetchMode(PDO::FETCH_ASSOC);
        }

        private function executeParameter()
        {
            if($this->values){
                foreach($this->values as $key => $value){
                    if($key == "limit" || $key == "offset"){
                        $value = (int) $value;
                    }

                    $this->query->bindValue(":{$key}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
                }
            }
        }
    }


