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

<div class="main-cadastro">
    <div class="box-cadastro">
        <form method="POST" action="" class="form-cadastro">
            <h2>Edição de Curso</h2>

            <div class="inputBox-cadastro">
                <?php
                $nomeCurso = "";
                if (isset($valueForm['nomeCurso'])) {
                    $nomeCurso = $valueForm['nomeCurso'];
                }
                ?>
                <input type="text" name="nomeCurso" id="name" value="<?php echo $nomeCurso ?>" required="required">
                <span>Nome do curso</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $descricao = "";
                if (isset($valueForm['descricao'])) {
                    $descricao = $valueForm['descricao'];
                }
                ?>
                <input type="descricao" name="descricao" id="descricao" value="<?php echo $descricao ?>" required="required">
                <span>Descrição</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $objetivos = "";
                if (isset($valueForm['objetivos'])) {
                    $objetivos = $valueForm['objetivos'];
                }
                ?>
                <input type="text" name="objetivos" value="<?php echo $objetivos ?>" required="required">
                <span>Objetivos</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $hiperlink = "";
                if (isset($valueForm['hiperlink'])) {
                    $hiperlink = $valueForm['hiperlink'];
                }
                ?>
                <input type="text" name="hiperlink" value="<?php echo $hiperlink ?>" required="required">
                <span>hiperlink</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $idResponsavel = "";
                if (isset($valueForm['idResponsavel'])) {
                    $idResponsavel = $valueForm['idResponsavel'];
                }
                ?>
                <input type="text" name="idResponsavel" value="<?php echo $idResponsavel ?>" required="required">
                <span>Usuário responsável</span>
                <i></i>
            </div>

            <div class="links-cadastro">
                <input type="submit" name="Cadastrar" value="Editar">
            </div>
        </form>
    </div>
</div>