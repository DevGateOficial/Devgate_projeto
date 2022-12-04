<?php

echo "<h2> Detalhes do curso </h2>";

echo "<a href='" . URLADM . "list-cursos/index'> Listar </a><br>";

if(!empty($this->data['viewCurso'])){
    echo "<a href='" . URLADM . "edit-cursos/index/" . $this->data['viewCurso'][0]['idCurso'] . "'> Editar </a><br>";

    echo "<a href='" . URLADM . "edit-cursos-image/index/" . $this->data['viewCurso'][0]['idCurso'] . "'> Editar imagem </a><br><br>";

    echo "<a href='" . URLADM . "cadastro-aula/index/" . $this->data['viewCurso'][0]['idCurso'] . "'> Cadastrar Aula </a><br><br>";

    echo "<a href='" . URLADM . "list-aulas/index/" . $this->data['viewCurso'][0]['idCurso'] . "'> Aulas </a><br><br>";
    
    echo "<a href='" . URLADM . "delete-curso/index/" . $this->data['viewCurso'][0]['idCurso'] . "'> Deletar </a><br><br>";
}

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
    echo "Foto: $imagem <br>";
    echo "idResponsavel: $idResponsavel <br>";
    echo "Nome do responsável: $nomeUsuario <br>";
}
