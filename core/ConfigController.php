<?php

    namespace Core;

    class ConfigController extends Config
    {
        private string $url;
        private array $urlArray;
        private string $urlController;
        //private string $urlParameter;
        private string $urlSlugController;
        private array $format;

        public function __construct()
        {
            $this->config();

            if(!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
                $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

                $this->clearUrl();

                $this->urlArray = explode("/", $this->url);
                
                if(isset($this->urlArray[0])){
                    $this->urlController = $this->slugController($this->urlArray[0]);
                }
                else{
                    $this->urlController = $this->slugController(CONTROLLERERRO);
                }
            }
            else{
                $this->urlController = $this->slugController(CONTROLLER);
            }

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

        private function slugController($slugController)
        {
            //As conversões a seguir tem como objetivo transformar o conteúdo da url em algo compatível com o nome das Classes, tornando mais fácil o trabalho de redirecionamento

            //Converter para minusculo
            $this->urlSlugController = strtolower($slugController);

            //Converter - para espaço em branco
            $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);

            //Converter letras iniciais de cada palavra para maiusculo
            $this->urlSlugController = ucwords($this->urlSlugController);

            //Remover espaço em branco
            $this->urlSlugController = str_replace(" ", "", $this->urlSlugController);

            return $this->urlSlugController;
        }

        public function loadPage()
        {
            $classLoad = "\\Sts\\Controllers\\" . $this->urlController;
            $classPage = new $classLoad();
            $classPage->index();
        }
    }