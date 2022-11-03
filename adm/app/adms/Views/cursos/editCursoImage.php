<?php

if (isset($this->data['form'][0])) {
    $valueForm = $this->data['form'][0];
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<div class="main-cadastro">
    <div class="box-cadastro">
        <form method="POST" action="" class="form-cadastro" enctype="multipart/form-data">
            <h2>Edição da Imagem do Curso</h2>

            <?php
            $idCurso = "";
            if (isset($valueForm['idCurso'])) {
                $idCurso = $valueForm['idCurso'];
            }
            ?>
            <input type="hidden" name="idCurso" value="<?php echo $idCurso ?>">

            <div class="inputBox-cadastro">
                <input type="file" name="foto" id="foto">
                <span>Imagem</span>
                <i></i>
            </div>

            <div class="links-cadastro">
                <input type="submit" name="EditCursoImage" value="Editar">
            </div>
        </form>
    </div>
</div>