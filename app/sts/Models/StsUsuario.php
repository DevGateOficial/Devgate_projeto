<?php

    namespace Sts\Models;

    // Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
    if(!defined('D3V3G4T3')){
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    class StsUsuario
    {
        private array $data;

        public function create(array $data): bool
        {
            $this->data = $data;
            //var_dump($this->data);

            $createUsuario = new \Sts\Models\helper\StsCreate();
            $createUsuario->executeCreate("usuario", $this->data);

            if($createUsuario->getResult()){
                $_SESSION['msg'] = "<h3> Usuário cadastrado com sucesso </h3>";
                return true;
            }else{
                $_SESSION['msg'] = "<h3> Erro: não foi possível cadastrar o usuário </h3>";
                return false;
            }
        }
    }
      