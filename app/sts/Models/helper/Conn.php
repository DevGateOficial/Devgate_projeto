<?php

    namespace Sts\Models\helper;

    use PDO;
    use PDOException;

    abstract class Conn
    {
        private string $db = "mysql";
        private string $host = "localhost";
        private string $user = "root";
        private string $pass = "root";
        private string $dbname = "devgate_database";
        private int $port = 3306;
        private object $connect;

        public function connectDb()
        {
            try{
                $this->connect = new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname,
                        $this->user, $this->pass);
                //echo "Conexão realizada com sucesso<br>";
                return $this->connect;

            }catch (PDOException $err){
                die('Ocorreu um erro! Por gentileza tente novamente. Caso o problema persista, entre em contato com o suporte: ' . EMAILADM);
            }
        }

    }   