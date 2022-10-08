<?php

    namespace Sts\Controllers;


    // Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
    if(!defined('D3V3G4T3')){
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    /**
     * Controller da página Erro
     * 
     * 
     */
    class Erro
    {
        /** @var array|string|null $dados Recebe os dados que devem ser enviados para VIEW */
        private array|string|null $data;

        /**
         * Instanciar a classe responsável em carregar a View
         * 
         * @return void
         */
        public function index()
        {
            $this->data = null;
            $loadView = new \Core\ConfigView("sts/Views/erro/erro", $this->data);
            $loadView->loadView();
        }
    }