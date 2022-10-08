<?php

    namespace Core;

    /**
     * Carrega as páginas da View
     */
    class ConfigView
    {        
        /**
         * Recebe o endereço da View e os dados
         *
         * @param string $nameView Endereoço da View que deve ser carregada
         * @param array|string|null $data Dados que a View deve receber
         */
        public function __construct(private string $nameView, private array|string|null $data)
        {
            // var_dump($this->nameView);
            // var_dump($this->data);
        }

        /**
         * Carrega a View
         * Verifica se o arquivo existe, caso exista, o carrega e se não existir para o carregamento
         *
         * @return void
         */
        public function loadView(): void 
        {
            if(file_exists('app/' . $this->nameView . '.php')){
                include 'app/sts/Views/include/header.php';
                include 'app/' . $this->nameView . '.php';
                include 'app/sts/Views/include/footer.php';
            }
            else{
                die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o suporte: " . EMAILADM);
            }
        }
    }