<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    var_dump($valueForm);
}

?>

<h1> Crie seu cadastro! </h1>

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
    <label> Nome completo: </label>
    <input type="text" name="user" id="user" placeholder="Digite o seu nome completo" value="<?php echo $user ?>">

    <br>

    <label> email: </label>
    <input type="email" name="user" id="user" placeholder="Digite o seu email" value="<?php echo $user ?>">

    <br>

    <label> Nome de usuário: </label>
    <input type="text" name="user" id="user" placeholder="Digite o seu usuário" value="<?php echo $user ?>">

    <br>

    <label> Senha: </label>
    <input type="password" name="password" id="password" placeholder="Digite a sua senha" value="">

    <br>

    <label> Data de nascimento: </label>
    <input type="password" name="password" id="password" placeholder="Digite a sua senha" value="">

    <br>

    <input type="submit" name="SendLogin" value="Cadastrar">
</form>

<p> <a href="<?php echo URLADM; ?>login/index"> Clique aqui para acessar </a> </p>