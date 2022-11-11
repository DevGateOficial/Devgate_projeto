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
    <div class="texto">
        <h2>DevGate</h2>
        <p>Entre nesse portal e aprenda a programar</p>
    </div>
    <div class="login-form">
        <form method="POST" action="">
            <?php
            $user = "";
            if (isset($valueForm['user'])) {
                $user = $valueForm['user'];
            }
            ?>
            <input type="text" name="user" placeholder="Login" value="<?php echo $user ?>" required>
            <input type="password" name="password" placeholder="Senha" required>
            <span><a href="<?php echo URLADM; ?>recover-pass/index">Recuperar a Senha</a></span>
            <input class="btn" type="submit" name="SendLogin" value="Entrar" />
            <span><a href="<?php echo URLADM; ?>cadastro-user/index">Novo? Registrar-se aqui!</a></span>
           
        </form>
    </div>
</main>
