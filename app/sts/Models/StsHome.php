<?php

    namespace Sts\Models;

    // Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
    if(!defined('D3V3G4T3')){
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    class StsHome
    {
        private array $data;

        private object $connection;

        /**
         * Retornar os cursos existentes no banco de dados
         *
         * @return array
         */
        public function index(): array
        {
            $view_curso = new \Sts\Models\helper\StsRead();
            //$view_curso->executeRead("curso", "LIMIT :limit", "limit=1");

            $view_curso->fullRead("SELECT * FROM curso WHERE idCurso=:id", "id=3");

            $this->data = $view_curso->getResult();
                    
            return $this->data;
        }
    }