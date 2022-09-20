<?php

    namespace Core;

    class ConfigController
    {
        private string $url;
        private array $urlArray;
        private string $urlController;
        private string $urlParameter;
        private string $urlSlugController;
        private array $format;

        public function __construct()
        {
            echo "Carregar a página<br>";

            if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
                $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
                var_dump($this->url);

                $this->clearUrl();

                $this->urlArray = explode("/", $this->url);
                var_dump($this->urlArray);
                
                if(isset($this->urlArray[0])){
                    var_dump($this->urlArray[0]);
                    $this->urlController = $this->urlArray[0];
                }
                else{
                    $this->urlController = "Home";
                }
            }
            else{
                echo "Acessa a página inicial<br>";
                $this->urlController = "Home";
            }

            echo "<br>";
            echo "Controller: {$this->urlController}<br>";
        }

        private function clearUrl()
        {
            //Eliminar possiveis tags na url
            $this->url = strip_tags($this->url);

            //Eliminar espaços em branco
            $this->url = trim($this->url);

            //Eliminar barra no final da url
            $this->url = rtrim($this->url, "/");

            //Eliminar caracteres
            $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
            
            $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-------------------------------------------------------------------------------------------------';

            $this->url = strtr(utf8_decode($this->url), utf8_decode($this->format['a']), $this->format['b']);
        }

        // public function loadPage()
        // {
        //     $urlController = ucwords($this->urlController);
        //     //echo "Carregar a página/controller <br>";
        //     $classLoad = "\\Sts\Controllers\\" . $urlController;
        //     //echo $classLoad . "<br>";
        //     $classPage = new $classLoad;
        //     $classPage->index();
        // }
    }