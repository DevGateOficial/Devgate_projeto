<?php 
var_dump($this->data);
?>

<h1> Área Restrita </h1>

<form method="POST" action="">
    <label> Usuário: </label>
    <input type="text" name="user" id="user" placeholder="Digite o seu usuário">

    <br>

    <label> Senha: </label>
    <input type="password" name="password" id="password" placeholder="Digite a sua senha">

    <br>

    <input type="submit" name="SendLogin" value="Acessar">
</form>