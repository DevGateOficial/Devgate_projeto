<?php

    // Redirecionar ou para o processamento quando o usuário não acessa o arquivo index.php
    if (!defined('D3V3G4T3')) {
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }
?>

<div id=form>
    <h1>Cadastro de Curso</h1>
    <form method="POST" action="">
        <input type="text" name="nomeCurso" placeholder="Email" maxlength="60"> 
    </br>
        <textarea name="descricao" id="areadetexto" cols="30" rows="8"></textarea>
    </br>
        <textarea name="objetivos" id="areadetexto" cols="10" rows="12"></textarea>
    </br>
        <label for="foto"> Foto </label>
        <input name="foto" type="file">
    </br>
        <input type="submit" name="CriarCurso" value="CriarCurso">
    </form>
</div>