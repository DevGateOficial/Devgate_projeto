<?php

    namespace Sts\Models;

    class StsListarCursos extends Conn
    {
        private object $conn;

        public function listar(): array
        {
            //echo "Acessou a models listar";
            $this->conn = $this->connectDb();
            //var_dump($this->conn);

            $query_cursos = "SELECT idCurso, nomeCurso, descricao, objetivos, hiperlink FROM curso ORDER BY idCurso";
            $result_curso = $this->conn->prepare($query_cursos);
            $result_curso->execute();
            $retorno = $result_curso->fetchAll();
            return $retorno;
        }
    }