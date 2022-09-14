<?php

    class Conn{

        public $host = "localhost";
        public $user = "root";
        public $pass = "root";
        public $dbname = "devgate_database";
        public $port = 3306;
        public $connect = null;

        public function conectar(){
            try{
                $this->connect = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname, $this->user, $this->pass);
                return $this->connect;
            }
            catch (Exception $err){
                echo "Ocorreu uma falha na conexão! Erro: " . $err;
                return false;
            }
        }
    }