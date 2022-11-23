<?php 
    if(!defined('D3V3G4T3')){
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    echo "<h1> Página Inicial </h1><bR>";

    //var_dump($this->data);
    echo "<a href='" . URL . "acesso-adm/index" . "'> Acessar área administrativa </a><br><br>";


    if(!empty($this->data)){
        foreach($this->data as $data){
            extract($data);

            echo "ID: $idCurso <br>";
            echo "Nome: $nomeCurso <br>";
            echo "Descricão: $descricao <br>";
            echo "Objetivos: $objetivos <br>";
            echo "Hiperlink: $hiperlink <br>";

            echo "<br> <hr> <br>";
        }
    }
    else{
        echo "<p style='color: #f00;'> Erro: Nenhum registro encontrado!</p>";
    }
?>