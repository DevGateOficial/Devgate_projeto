<?php

echo "<h2> Detalhes do curso </h2>";

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

echo "<hr>";

if(!empty($this->data['viewCurso'])){
    extract($this->data['viewCurso'][0]);
    echo "ID: $idCurso <br>";
    echo "Nome do curso: $nomeCurso <br>";
    echo "Descrição: $descricao <br>";
    echo "Objetivos: $objetivos <br>";
    echo "Hiperlink: $hiperlink <br>";

    if(!empty($foto))
        echo "Foto: $foto <br>";

    echo "<h3> Professor responsável </h3>";
    echo "idResponsavel: $idResponsavel <br>";
    echo "Nome do responsável: $nomeUsuario <br>";
}
