<?php

    namespace Core;

    /**
     * Guarda informações importantes sobre o projeto, tornando mais fácil as instanciar em outras classes
     */
    abstract class Config
    {
        protected function config(): void
        {
            //URL do projeto
            define('URL', 'http://localhost/github/CRUD/');

            define('CONTROLLER', 'Home');
            define('CONTROLLERERRO', 'Erro');

            //Credenciais do banco de dados
            define('DB', 'mysql');
            define('HOST', 'localhost');
            define('USER', 'root');
            define('PASS', 'root');
            define('DBNAME', 'devgate_database');
            define('PORT', 3306);

            //Credencias de contato
            define('EMAILADM', 'devgate_oficial@gmail.com');
        }
    }