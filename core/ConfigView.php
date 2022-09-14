<?php

    namespace Core;

    class ConfigView
    {
        public function __construct(private string $nome, private array $dados)
        {
            //var_dump($this->nome);
            //var_dump($this->dados);
        }

        public function renderizar()
        {
            if(file_exists('app/' . $this->nome . '.php')){
                include 'app/' . $this->nome . '.php';

            } else{
               echo "Ocorreu um erro! Por gentileza tente novamente. Caso o problema persista, entre em contato com o suporte";
            }
        }
    }