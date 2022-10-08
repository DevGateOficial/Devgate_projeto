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

            $StsCreateCurso = new \Sts\Models\helper\StsCreate();
            $StsCreateCurso->executeCreate("curso", $this->data);
            
            $_SESSION['msg'] = "<p> Salvar mensagem </p>";
            return false;
        }
    }
      