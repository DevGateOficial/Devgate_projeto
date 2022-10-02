<?php 

    // Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php
    if(!defined('D3V3G4T3')){
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    echo "<h1> Página Inicial </h1><bR>";

    //var_dump($this->data);

    if(!empty($this->data[0])){
        
        extract($this->data[0]);

        echo "ID: $idCurso <br>";
        echo "Nome: $nomeCurso <br>";
        echo "Descricão: $descricao <br>";
        echo "Objetivos: $objetivos <br>";
        echo "Hiperlink: $hiperlink <br>";
    }



    //http://localhost/github/CRUD/app/sts/Views/home/home.php