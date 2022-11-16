<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    //var_dump($valueForm);
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
            <?php
            $nomeCurso = "";
            if (isset($valueForm['nomeCurso'])) {
                $nomeCurso = $valueForm['nomeCurso'];
            }
            ?>
            <input type="text" placeholder="Nome do Curso" name="nomeCurso" id="name" value="<?php echo $nomeCurso ?>" required="required">

            <?php
            $descricao = "";
            if (isset($valueForm['descricao'])) {
                $descricao = $valueForm['descricao'];
            }
            ?>
            <input type="descricao" placeholder="Descrição" name="descricao" id="descricao" value="<?php echo $descricao ?>" required="required">

            <?php
            $objetivos = "";
            if (isset($valueForm['objetivos'])) {
                $objetivos = $valueForm['objetivos'];
            }
            ?>
            <input type="text" placeholder="Objetivos" name="objetivos" value="<?php echo $objetivos ?>" required="required">

            <?php
            $hiperlink = "";
            if (isset($valueForm['hiperlink'])) {
                $hiperlink = $valueForm['hiperlink'];
            }
            ?>
            <input type="text" placeholder="Link" name="hiperlink" value="<?php echo $hiperlink ?>" required="required">

            <?php
            $idResponsavel = "";
            if (isset($valueForm['idResponsavel'])) {
                $idResponsavel = $valueForm['idResponsavel'];
            }
            ?>



            <!-- submit button -->
            <input class="submit-btn" type="submit" value="Registrar Curso" />
        </form>
    </div>
</main>