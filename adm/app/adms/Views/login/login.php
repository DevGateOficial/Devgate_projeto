<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    var_dump($valueForm);
}

//Criptografar a senha
//echo password_hash("123456a", PASSWORD_DEFAULT);
?>

<h1> Área Restrita </h1>

<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<form method="POST" action="">

    <?php
    $user = "";
    if (isset($valueForm['user'])) {
        $user = $valueForm['user'];
    }
    ?>
    <label> Usuário: </label>
    <input type="text" name="user" id="user" placeholder="Digite o seu usuário" value="<?php echo $user ?>">

    <br>

    <label> Senha: </label>
    <input type="password" name="password" id="password" placeholder="Digite a sua senha" value="">

    <br>

    <input type="submit" name="SendLogin" value="Acessar">
</form>