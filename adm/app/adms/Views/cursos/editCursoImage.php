<?php

if (isset($this->data['form'][0])) {
    $valueForm = $this->data['form'][0];
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
        <h2>Edição da Imagem do Curso</h2>
        <p></p>
        <div class="gn-form">

            <form method="POST" action="" class="form-cadastro">
                <?php
                $idCurso = "";
                if (isset($valueForm['idCurso'])) {
                    $idCurso = $valueForm['idCurso'];
                }
                ?>
                <input type="hidden" name="idCurso" value="<?php echo $idCurso ?>">

                <input type="file" name="imagem" id="foto">

                <input type="submit" name="EditCursoImage" value="Editar">
            </form>
        </div>
    </div>
</main>