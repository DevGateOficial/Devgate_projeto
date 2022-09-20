<?php

    namespace Sts\Models;

    class StsDeletarCursos extends Conn
    {
        private object $conn;

        public function listar()
        {
            //echo "Acessou a models criar";
            $this->conn = $this->connectDb();
            //var_dump($this->conn);
            
            $query_cursos = "DELETE FROM curso WHERE idCurso = '1'";
            $update_curso = $this->conn->prepare($query_cursos);
            $update_curso->execute();
        }
    }