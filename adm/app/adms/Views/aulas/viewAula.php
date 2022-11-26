<?php

echo "<h2> Detalhes da aula </h2>";

echo "<a href='" . URLADM . "list-aulas/index'> Listar </a><br>";

if(!empty($this->data['viewAula'])){
    #echo "<a href='" . URLADM . "edit-cursos/index/" . $this->data['viewCurso'][0]['idCurso'] . "'> Editar </a><br>";

    echo "<a href='" . URLADM . "cadastro-atividade/index/" . $this->data['viewAula'][0]['idAula'] . "'> Cadastrar Atividade </a><br>";

    echo "<a href='" . URLADM . "list-atividades/index/" . $this->data['viewAula'][0]['idAula'] . "'> Ver atividades </a><br><br>";

}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

echo "<hr>";

if(!empty($this->data['viewAula'])){
    extract($this->data['viewAula'][0]);

    echo "ID: $idAula <br>";
    echo "Nome da aula: $nomeAula <br>";
    echo "Descrição: $descricao <br>";
    echo "iD do curso: $idCurso <br>";
}
