<?php

    namespace Sts\Models;

    // Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
    if(!defined('D3V3G4T3')){
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    class StsCurso
    {
        private array $data;

        public function create(array $data): bool
        {
            $this->data = $data;
            //var_dump($this->data);

            $createCurso = new \Sts\Models\helper\StsCreate();
            $createCurso->executeCreate("curso", $this->data);

            if($createCurso->getResult()){
                var_dump($createCurso->getResult());
                $_SESSION['msg'] = "<h3> Curso cadastrado com sucesso </h3>";
                return true;
            }else{
                $_SESSION['msg'] = "<h3> Erro: não foi possível cadastrar o curso </h3>";
                return false;
            }
        }
    }
      