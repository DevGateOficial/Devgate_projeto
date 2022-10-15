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

<div class="main-login">
    <div class="left-login">
        <div class="text">
            <h1>DevGate <br> Todos aqui odeiam Java!</h1>
        </div>
    </div>

    <div class="right-login">
        <div class="box">
            <form class="form" method="POST" action="">
                <h2>Sign in</h2>

                <div class="inputBox">
                    <?php
                    $user = "";
                    if (isset($valueForm['user'])) {
                        $user = $valueForm['user'];
                    }
                    ?>
                    <input type="text" name="user" id="user" required="required" value="<?php echo $user ?>">
                    <span>Username</span>
                    <i></i>
                </div>

                <div class="inputBox">

                    <input type="password" type="password" name="password" id="password" value="" required="required">
                    <span>Password</span>
                    <i></i>
                </div>

                <div class="links">
                    <a href="#">Forgot Password</a>
                    <a href="<?php echo URLADM; ?>cadastro-user/index">Sign up</a>
                </div>
                <input type="submit" name="SendLogin" value="Login"> 
            </form>
        </div>
    </div>
</div>

</body>

</html>