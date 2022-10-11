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
            $viewCurso = new \Sts\Models\helper\StsRead();

            //$viewCurso->executeRead("curso", "WHERE idCurso=:idCurso LIMIT :limit", "idCurso=1&limit=1");

            $viewCurso->fullRead("SELECT idCurso, nomeCurso, descricao, objetivos, hiperlink FROM curso WHERE idCurso=:idCurso LIMIT :limit", "idCurso=1&limit=1");

            $this->data = $viewCurso->getResult();
   
            return $this->data;
        }
    }