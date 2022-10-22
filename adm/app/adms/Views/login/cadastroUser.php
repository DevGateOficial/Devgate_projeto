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

<a href="homepage-vist.html">HomePage</a>
<a href="login-form.html">login-form</a>

<main>
    <div class="texto">
        <h2>DevGate</h2>
        <p>Embarque nesse barco e aprenda a programar</p>
    </div>
    <div class="login-form">
        <form action="POST">

            <?php
            $nomeUsuario = "";
            if (isset($valueForm['nomeUsuario'])) {
                $nomeUsuario = $valueForm['nomeUsuario'];
            }
            ?>
            <input type="text" name="nomeUsuario" placeholder="Nome Usuário" maxlength="30" value="<?php echo $nomeUsuario ?>" />

            <?php
            $nomeCompleto = "";
            if (isset($valueForm['nomeCompleto'])) {
                $nomeCompleto = $valueForm['nomeCompleto'];
            }
            ?>
            <input type="text" name="nomeCompleto" placeholder="Nome Completo" maxlength="120" value="<?php echo $nomeCompleto ?>" />

            <?php
            $email = "";
            if (isset($valueForm['email'])) {
                $email = $valueForm['email'];
            }
            ?>
            <input type="email" name="email" placeholder="devgate@sicdev.com" maxlength="60" value="<?php echo $email ?>" />

            <input type="password" name="senha" placeholder="Senha" minlength="8" maxlength="30" />

            <?php
            $dtNascimento = "";
            if (isset($valueForm['dtNascimento'])) {
                $dtNascimento = $valueForm['dtNascimento'];
            }
            ?>
            <input type="date" name="dtNascimento" value=" <?php echo $dtNascimento ?>" />

            <input class="btn" type="submit" name="Cadastrar" value="Registrar-se" />
        </form>
    </div>
</main>



<!-- <div class="inputBox-cadastro">

    <input type="text" name="nomeUsuario" required="required">
    <span>Nome Usuário</span>
    <i></i>
</div>

<div class="inputBox-cadastro">
    <?php
    $senha = "";
    if (isset($valueForm['senha'])) {
        $senha = $valueForm['senha'];
    }
    ?>
    <input type="password" name="senha" value="<?php echo $senha ?>" required="required">
    <span>Senha</span>
    <i></i>
</div>

<div class="inputBox-cadastro">

    <input type="date" name="dtNascimento" required="required">
    <span>Data de Nascimento</span>
    <i></i>
</div>

<div class="links-cadastro">
    <input type="submit" name="Cadastrar" value="Cadastrar">
    <a href="<?php echo URLADM; ?>login/index"> Sign in </a>
</div>
</form>
</div>
</div> --> -->