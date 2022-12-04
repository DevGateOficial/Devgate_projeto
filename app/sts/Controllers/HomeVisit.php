<?php

    namespace Sts\Controllers;

    class HomeVisit
    {
        /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
        private array|string|null $data = [];
        
        /**
         * Instancia a classe responsável em carregar a View
         *
         * @return void
         */
        public function index(): void
        {
            
            $loadView = new \Core\ConfigView("sts/Views/home/homeVisit", $this->data);
            $loadView->loadView();
        }
    }