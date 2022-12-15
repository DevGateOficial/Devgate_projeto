<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    var_dump($valueForm);
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<h2> Listagem de Cursos </h2>

<form method="POST" action="">
    <?php
    $pesquisa = "";
    if (isset($valueForm['pesquisa'])) {
        $pesquisa = $valueForm['pesquisa'];
    }
    ?>
    <input type="text" name="pesquisa" value="<?php echo $pesquisa ?>">
    <input class="btn" type="submit" name="pesquisar" value="pesquisar" />
</form>

<?php
foreach ($this->data['listCursos'] as $curso) :
    extract($curso);
    echo "ID: $idCurso <br>";
    echo "Nome do curso: $nomeCurso <br>";
    echo "Objetivos: $objetivos <br>";
    echo "Descrição: $descricao <br>";
    echo "<a href='" . URL . "view-curso/index/$idCurso'> Visualizar </a><br>";
    echo "<hr>";
?>

<?php endforeach; ?>