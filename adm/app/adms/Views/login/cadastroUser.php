<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    var_dump($valueForm);
}

?>

<h1> Crie seu cadastro! </h1>

<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<form method="POST" action="">

    <?php
    $name = "";
    if (isset($valueForm['name'])) {
        $name = $valueForm['name'];
    }
    ?>

    <label> Nome completo: </label>
    <input type="text" name="name" id="user" placeholder="Digite o seu nome completo" value="<?php echo $name ?>">

    <?php
    $email = "";
    if (isset($valueForm['email'])) {
        $email = $valueForm['email'];
    }
    ?>

    <label> email: </label>
    <input type="email" name="email" id="user" placeholder="Digite o seu email" value="<?php echo $email ?>">

    <?php
    $user = "";
    if (isset($valueForm['user'])) {
        $user = $valueForm['user'];
    }
    ?>

    <label> Nome de usuário: </label>
    <input type="text" name="user" id="user" placeholder="Digite o seu usuário" value="<?php echo $user ?>">

    <?php
    $password = "";
    if (isset($valueForm['password'])) {
        $password = $valueForm['password'];
    }
    ?>

    <label> Senha: </label>
    <input type="password" name="password" id="password" placeholder="Digite a sua senha" value="<?php echo $password ?>">

    <?php
    $date = "";
    if (isset($valueForm['date'])) {
        $date = $valueForm['date'];
    }
    ?>

    <label> Data de nascimento: </label>
    <input type="date" name="date" id="date" placeholder="Digite a sua senha" value="<?php echo $date?>">

    <input type="submit" name="cadastrar" value="Cadastrar">
</form>

<p> <a href="<?php echo URLADM; ?>login/index"> Clique aqui para acessar </a> </p>