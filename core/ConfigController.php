<?php

    namespace Core;

    /**
     * Recebe e manipula a URL
     * Carrega a Controller
     */

    class ConfigController extends Config
    {
        /** @var string $url recebe a URL do .htacces*/
        private string $url;
        /** @var string $urlArray recebe a URL convertida para array*/
        private array $urlArray;
        /** @var string $urlController recebe a URL do .htacces*/
        private string $urlController;
        //private string $urlParameter;
        private string $urlSlugController;
        /** @var string $format recebe listas de caracteres*/
        private array $format;

        /**
         * Recebe a URL do .htacces
         * Valida a URL
         */
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

        /**
         * Método privado, não podendo ser instanciado fora da classe
         * Manipula a URL, eliminando TAGS, espaços em branco, removendo a barra ao fim da URL e também remove os caracteres especiais
         *
         * @return void
         */
        private function clearUrl():void
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

        /**
         * 
         * Converte o valor obtido da URL o convertendo no padrão e formato de uma classe
         * Utilizando as funções de converter tudo para minusculo, converter traço para espaço em branco, converter letras iniciais para maiúsculo e removendo os espaços
         *
         * @param string $slugController
         * @return string
         */
        private function slugController($slugController):string
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

        /**
         * Carrega as Controllers
         * Instancia as classes da controller e carrega o método index
         *
         * @return void
         */
        public function loadPage()
        {
            $classLoad = "\\Sts\\Controllers\\" . $this->urlController;
            $classPage = new $classLoad();
            $classPage->index();
        }
    }