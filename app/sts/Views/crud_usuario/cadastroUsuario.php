<?php

use Sts\Controllers\Usuario;

// Redirecionar ou para o processamento quando o usuário não acessa o arquivo index.php
if (!defined('D3V3G4T3')) {
    //header("Location: /");
    die("Erro: Página não encontrada!");
}

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    extract($valueForm);
}
?>
    <main>
        <section class="text">
            <h1>DevGate</h1>
            <p>
                Entre nesse portal <br/>
                e aprenda a <br/>
                programar
            </p>
        </section>

        <div class=login-form>
            <h1>Cadastro</h1>
            <form method="POST" action="">

                <input type="text" name="nomeUsuario" id="" placeholder="Nome Usuário" maxlength="30"></br>

                <input type="text" name="nomeCompleto" id="" placeholder="Nome Completo" maxlength="120"></br>

                <input type="email" name="email" id="" placeholder="devgate@sicdev.com" maxlength="60"></br>

                <input type="password" name="senha" id="" placeholder="Senha" minlength="8" maxlength="30"></br>

                <input type="date" name="dtNascimento"></br>

                <select name="tipoUsuario" id="">   
                    <option value="aluno"> Aluno </option>
                    <option value="professor"> Professor </option>
                    <option value="administrador"> Administrador </option>
                </select><br>

                <input type="submit" name="CadastrarUsuario" value="Cadastrar">
            </form>
        </div>
    </main>