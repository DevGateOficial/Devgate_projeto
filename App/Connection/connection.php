<?php
    define('HOST', 'localhost');
    define('DATABASENAME', 'devgate_database');
    define('USER', 'root');
    define('PASSWORD', 'root');
    
    Class Connect{
        protected $connection;
        
        function __construct() //nao é redundante?
        {
            $this->connectDatabase();
        }

        function connectDatabase()
        {
            try{
                $this->connection = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME, USER, PASSWORD);
                echo "Conectado";
                //ta funcionando
                return $this->connection; //fiz isso pra mandar a conexão pra outras partes
            }
            catch(PDOException $e)
            {
                echo "Daniel".$e->getMessage(); 
                die();
            }
        }
    }
    $testConnection = new Connect();

    ?>
    
