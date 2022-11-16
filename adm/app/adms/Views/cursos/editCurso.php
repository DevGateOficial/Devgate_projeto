<?php

if (isset($this->data['form'][0])) {
    $valueForm = $this->data['form'][0];
    var_dump($valueForm);
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<main>
    <div class="page-text">
        <h2>DevGate</h2>
        <p>Registrar um novo curso na plataforma</p>
    </div>
    <div class="gn-form">
        <form action="">
            <input class="submit-btn" type="submit" value="Registrar Curso" />
        </form>
    </div>
</main>


<main>
    <div class="page-text">
        <h2>Curso</h2>
        <p>Pagina de Edição de curso</p>
    </div>
    <div class="gn-form">
        <?php
        $idCurso = "";
        if (isset($valueForm['idCurso'])) {
            $idCurso = $valueForm['idCurso'];
        }
        ?>
        <input type="hidden" name="idCurso" value="<?php echo $idCurso ?>">

        <?php
        $nomeCurso = "";
        if (isset($valueForm['nomeCurso'])) {
            $nomeCurso = $valueForm['nomeCurso'];
        }
        ?>
        <input type="text" name="nomeCurso" id="name" value="<?php echo $nomeCurso ?>" required="required">

        <?php
        $descricao = "";
        if (isset($valueForm['descricao'])) {
            $descricao = $valueForm['descricao'];
        }
        ?>
        <input type="descricao" name="descricao" id="descricao" value="<?php echo $descricao ?>" required="required">

        <?php
        $objetivos = "";
        if (isset($valueForm['objetivos'])) {
            $objetivos = $valueForm['objetivos'];
        }
        ?>
        <input type="text" name="objetivos" value="<?php echo $objetivos ?>" required="required">

        <?php
        $hiperlink = "";
        if (isset($valueForm['hiperlink'])) {
            $hiperlink = $valueForm['hiperlink'];
        }
        ?>
        <input type="text" name="hiperlink" value="<?php echo $hiperlink ?>" required="required">


        <input class="submit-btn" type="submit" value="Registrar Curso" />

        </form>
    </div>
</main>