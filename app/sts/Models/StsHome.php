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

        public function index(): array
        {
            $this->data = [
                "title" => "Topo da página",
                "description" => "Descrição do serviço"
            ];

            return $this->data;
        }
    }