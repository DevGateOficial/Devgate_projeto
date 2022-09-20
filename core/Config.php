<?php

    namespace Core;

    abstract class Config
    {
        protected function config(): void
        {
            //URL do projeto
            define('URL', 'http://localhost/github/CRUD/');

            define('CONTROLLER', 'Home');
            define('CONTROLLERERRO', 'Erro');

            //Credenciais do banco de dados

            define('EMAILADM', 'devgate_oficial@gmail.com');
        }
    }