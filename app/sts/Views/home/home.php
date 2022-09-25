<?php 

    // Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
    if(!defined('D3V3G4T3')){
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    echo "View da página home <br>";

    var_dump($this->data);

    //http://localhost/github/CRUD/app/sts/Views/home/home.php