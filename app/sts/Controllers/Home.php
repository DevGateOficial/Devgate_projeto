<?php

    namespace Sts\Controllers;

    class Home
    {
        /** @var array|string|null $data Recebe os dados que devem ser enviados para a VIEW*/
        private array|string|null $data;
        
        /**
         * Instancia a classe responsável em carregar a View
         *
         * @return void
         */
        public function index(): void
        {
            $home = new \Sts\Models\StsHome();
            $this->data = $home->index();
            $loadView = new \Core\ConfigView("sts/Views/home/home", $this->data);
            $loadView->loadView();
        }
    }