<?php

echo "<h2> Detalhes do curso </h2>";

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

if(!empty($this->data['viewCurso'])){
    extract($this->data['viewCurso'][0]);
    echo "ID: $idCurso <br>";
    echo "Nome do curso: $nomeCurso <br>";
    echo "Descrição: $descricao <br>";
    echo "Objetivos: $objetivos <br>";
    echo "Hiperlink: $hiperlink <br>";
    echo "Foto: $foto <br>";
    echo "idResponsavel: $idResponsavel <br>";
    echo "Nome do responsável: $nomeUsuario <br>";
}
