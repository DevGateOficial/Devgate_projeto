<?php

    //echo "View - listar os cursos par ao usuário<br>";
    //var_dump($this->dados);

    foreach($this->dados['cursos'] as $curso){
        //var_dump($curso);
        extract($curso);
        echo "ID: $idCurso <br>"; 
        echo "Nome: $nomeCurso <br>"; 
        echo "Descrição: $descricao <br>"; 
        echo "Objetivos: $objetivos <br>"; 
        echo "Hiperlink: $hiperlink <br>"; 
        echo "<hr>";
    }