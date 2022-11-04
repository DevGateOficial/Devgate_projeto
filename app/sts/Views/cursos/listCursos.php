<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']); 
}

?>

<h2> Listagem de Cursos </h2>

<?php

foreach ($this->data['listCursos'] as $curso):
    extract($curso);
    echo "ID: $idCurso <br>";
    echo "Nome do curso: $nomeCurso <br>";
    echo "Objetivos: $objetivos <br>";
    echo "Descrição: $descricao <br>";
    echo "<a href='".URL."view-curso/index/$idCurso'> Visualizar </a><br>";
    echo "<hr>";
?>

<?php endforeach; ?>