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

<div class="main-cadastro">
    <div class="box-cadastro">
        <form method="POST" action="" class="form-cadastro">
            <h2>Nova senha</h2>

            <div class="inputBox-cadastro">
                <?php
                $novaSenha = "";
                if (isset($valueForm['novaSenha'])) {
                    $novaSenha = $valueForm['novaSenha'];
                }
                ?>
                <input type="text" name="novaSenha" id="novaSenha" value="<?php echo $novaSenha ?>" required="required">
                <span>Nova senha</span>
                <i></i>
            </div>

            <div class="links-cadastro">
                <input type="submit" name="UpdatePass" value="Enviar">
                <a href="<?php echo URL; ?>login/index"> Sign in </a>
            </div>
        </form>
    </div>
</div>