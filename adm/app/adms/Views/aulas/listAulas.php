<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

// VER COMO VAI FICAR ESSA EXIBIÇÃO DOS CURSOS

foreach ($this->data['listAulas'] as $aulas) :
    echo "<hr>";
    extract($aulas);
    echo "ID: $idAula <br>";
    echo "Nome do curso: $nomeAula <br>";
    echo "Descrição: $descricao <br>";
    echo "Descrição: $idCurso <br>";
    
    // echo "<a href='" . URLADM . "view-curso/index/$idCurso'> Visualizar </a><br>";
    // echo "<a href='" . URLADM . "edit-cursos/index/$idCurso'> Editar </a><br><br>";
?>

<?php endforeach; ?>