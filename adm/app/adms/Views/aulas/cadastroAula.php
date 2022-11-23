<?php
if (isset($this->data['form'][0])) {
    $valueForm = $this->data['form'][0];
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
        <p>Criar noma aula na plataforma</p>
    </div>
    <div class="gn-form">
        <form action="" method="POST">
            <?php
            $nomeAula = "";
            if (isset($valueForm['nomeAula'])) {
                $nomeAula = $valueForm['nomeAula'];
            }
            ?>
            <input type="text" placeholder="Nome do aula" name="nomeAula" id="name" value="<?php echo $nomeAula ?>" required="required">

            <?php
            $descricao = "";
            if (isset($valueForm['descricao'])) {
                $descricao = $valueForm['descricao'];
            }
            ?>
            <input type="descricao" placeholder="Descrição" name="descricao" id="descricao" value="<?php echo $descricao ?>" required="required">

            <?php
            $idCurso = "";
            if (isset($valueForm['idCurso'])) {
                $idCurso = $valueForm['idCurso'];
            }
            ?>
            <input type="hidden" name="idCurso" value="<?php echo $idCurso ?>">

            <input class="submit-btn" type="submit" name="CadastrarAula" value="Cadastro Aula"/>
        </form>
    </div>
</main>