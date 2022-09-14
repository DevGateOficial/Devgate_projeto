<?php

    require './App/Connection/connection.php';

    Class Cursos{

        public $connection;

        public function listar(){
            $conn = new Connect();
            $this->connection = $conn->connectDatabase();

            $query_cursos = "SELECT * from curso";
            $result_cursos = $this->connection->prepare($query_cursos);
            $result_cursos->execute();

            return $result_cursos->fetchAll();
        }
    }