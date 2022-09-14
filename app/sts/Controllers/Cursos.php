<?php

    namespace Sts\Controllers;

    class Cursos
    {
        private array $dados;

        public function index(){
            //echo "Controller/Página Cursos <br>";
            
            $listarCurso = new \Sts\Models\StsListarCursos();
            $this->dados = $listarCurso->listar();
            var_dump($this->dados);
        }
    }