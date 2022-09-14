<?php

    require './Connection.php';

    Class Cursos{

        public $connect;

        public function listar(){
            $conn = new Conn();
            $this->connect = $conn->conectar();

            $query_cursos = "SELECT idCurso, nomeCurso, descricao, objetivos, hiperlink FROM curso";
            $result_cursos = $this->connect->prepare($query_cursos);
            $result_cursos->execute();

            return $result_cursos->fetchAll();
        }

        public function criar(){
            $conn = new Conn();
            $this->connect = $conn->conectar();

            
        }
    }