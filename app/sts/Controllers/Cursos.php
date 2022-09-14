<?php

    namespace Sts\Controllers;

    use Core\ConfigView;

    class Cursos
    {
        private array $dados;

        public function index(){
            //echo "Controller/Página Cursos <br>";

            $listarCurso = new \Sts\Models\StsListarCursos();
            $this->dados['cursos'] = $listarCurso->listar();
            //var_dump($this->dados);
            $carregarView = new \Core\ConfigView("sts/Views/curso/listarCurso", $this->dados);
            $carregarView->renderizar();
        }
    }