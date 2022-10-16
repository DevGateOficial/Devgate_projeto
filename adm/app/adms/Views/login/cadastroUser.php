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
            <h2>Sign up</h2>

            <div class="inputBox-cadastro">
                <?php
                $name = "";
                if (isset($valueForm['name'])) {
                    $name = $valueForm['name'];
                }
                ?>
                <input type="text" name="nomeCompleto" id="name" value="<?php echo $name ?>" required="required">
                <span>Nome completo</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $email = "";
                if (isset($valueForm['email'])) {
                    $email = $valueForm['email'];
                }
                ?>
                <input type="email" name="email" id="email" value="<?php echo $email ?>" required="required">
                <span>E-mail</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $user = "";
                if (isset($valueForm['user'])) {
                    $user = $valueForm['user'];
                }
                ?>
                <input type="text" name="nomeUsuario" value="<?php echo $user ?>" required="required">
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
                <?php
                $date = "";
                if (isset($valueForm['date'])) {
                    $date = $valueForm['date'];
                }
                ?>
                <input type="date" name="dtNascimento" value=" <?php echo $date ?>" required="required">
                <span>Data de Nascimento</span>
                <i></i>
            </div>

            <div class="links-cadastro">
                <input type="submit" name="Cadastrar" value="Cadastrar">
                <a href="<?php echo URLADM; ?>login/index"> Sign in </a>
            </div>
        </form>
    </div>
</div>