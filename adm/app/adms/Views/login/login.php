<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    //var_dump($valueForm);
}

//Criptografar a senha
//echo password_hash("123456a", PASSWORD_DEFAULT);
?>

<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<a href="homepage-vist.html">HomePage</a>
<a href="register-form.html">registro</a>

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
            <span><a href="#">recuperar senha</a></span>
            <input class="btn" type="submit" name="SendLogin" value="Entrar" />
            <span><a href="<?php echo URLADM; ?>cadastro-user/index">Novo? Registrar-se aqui!</a></span>
        </form>
    </div>
</main>


<!-- <span id="msg"></span>

<div class="main-login">
    <div class="left-login">
        <div class="text">
            <h1>DevGate <br> Todos aqui odeiam Java!</h1>
        </div>
    </div>

    <div class="right-login">
        <div class="box-login">
            <form class="form-login" method="POST" action="" id="form-login">
                <h2>Sign in</h2>

                <div class="inputBox-login">
                    
                    <input type="text" name="user" id="user" required="required" value="<?php echo $user ?>">
                    <span>Username</span>
                    <i></i>
                </div>

                <div class="inputBox-login">
                    <input type="password" type="password" name="password" id="password" value="" required="required">
                    <span>Password</span>
                    <i></i>
                </div>

                <div class="links">
                    <a href="#">Forgot Password</a>
                    <a href="<?php echo URLADM; ?>cadastro-user/index">Sign up</a>
                </div>

                <button type="submit" name="SendLogin" value="Login">Login</button>
            </form>
        </div>
    </div>
</div> -->