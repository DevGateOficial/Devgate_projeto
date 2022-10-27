<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'][0];
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<main>
    <div class="texto">
        <h2>Edição de usuário</h2>
    </div>
    <div class="login-form">
        <form method="POST" action="">
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
            
            <input type="text" name="nomeCompleto" placeholder="Nome completo" maxlength="30" value="<?php echo $nomeCompleto ?>" />
            <?php

            $email = "";
            if (isset($valueForm['email'])) {
                $email = $valueForm['email'];
            }
            ?>
            <input type="email" name="email" placeholder="devgate@sicdev.com" maxlength="60" value="<?php echo $email ?>" />

            <?php
            $dtNascimento = "";
            if (isset($valueForm['dtNascimento'])) {
                $dtNascimento = $valueForm['dtNascimento'];
            }
            ?>
            <input type="date" name="dtNascimento" value=" <?php echo $dtNascimento ?>" />

            <input class="btn" type="submit" name="Cadastrar" value="Editar" />
        </form>
    </div>
</main>

