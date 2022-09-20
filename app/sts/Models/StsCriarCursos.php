<?php

    namespace Sts\Models;

    class StsCriarCursos extends Conn
    {
        private object $conn;

        public function listar()
        {
            //echo "Acessou a models criar";
            $this->conn = $this->connectDb();
            //var_dump($this->conn);

            // variáveis sendo utilizadas apenas como teste, cabe a criação de um formulário para a sua devida definição
            $nomeCurso = "Programando de forma divertida";
            $descricao = "Como se tornar um programador";
            $objetivos = "Aprender a programar";
            $hiperlink = "www.programe.com.br";
            
            $query_cursos = "INSERT INTO curso (nomeCurso, descricao, objetivos, hiperlink) VALUES ('$nomeCurso', '$descricao', '$objetivos', '$hiperlink')";
            $cadastro_curso = $this->conn->prepare($query_cursos);
            $cadastro_curso->execute();
        }
    }