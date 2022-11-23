<?php

namespace Core;

/**
 * Configurações básicas do site.
 *
 */
abstract class Config
{
    /**
     * Possui as constantes com as configurações.
     * Configurações de endereço do projeto.
     * Página principal do projeto.
     * Credenciais de acesso ao banco de dados
     * E-mail do administrador.
     * 
     * @return void
     */
    protected function configAdm(): void
    {
        define('URL', 'http://localhost/Devgate_projeto/');
        define('URLADM', 'http://localhost/Devgate_projeto/adm/');

        define('CONTROLLER', 'Dashboard');
        define('METODO', 'index');
        define('CONTROLLERERRO', 'Dashboard');

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