<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']); 
}

echo "Opa";

foreach ($this->data['listCursos'] as $curso):
    extract($curso);
    echo "ID: $idCurso <br>";
    echo "Nome do curso: $nomeCurso <br>";
    echo "Objetivos: $objetivos <br>";
    echo "Descrição: $descricao <br>";
    echo "<a href='".URLADM."view-curso/index/$idCurso'> Visualizar </a><br>";
    echo "<a href='".URLADM."edit-cursos/index/$idCurso'> Editar </a><br><br>";
    echo "<hr>";


?>

<?php endforeach; ?>