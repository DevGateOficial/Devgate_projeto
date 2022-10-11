<?php

// Redirecionar ou para o processamento quando o usuário não acessa o arquivo index.php
if (!defined('D3V3G4T3')) {
    //header("Location: /");
    die("Erro: Página não encontrada!");
}

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    extract($valueForm);
}

$criarCursinho = new \Sts\Controllers\Curso;

?>

<div id=form>
    <h1>Cadastro de Curso</h1>
    <form method="POST" action="">

        <?php
        $value_nomeCurso = "";

        if (isset($nomeCurso)) {
            $value_nomeCurso = $nomeCurso;
        }
        ?>
        <input type="text" name="nomeCurso" placeholder="Nome do curso" maxlength="60" value="<?php echo $value_nomeCurso?>"></br>

        <?php
        $value_descricao = "";

        if (isset($descricao)) {
            $value_descricao = $descricao;
        }
        ?>
        <textarea name="descricao" id="areadetexto" type="text" cols="30" rows="8">
            <?php echo $value_descricao?>
        </textarea></br>
        
        <?php
        $value_objetivos = "";

        if (isset($descricao)) {
            $value_objetivos = $objetivos;
        }
        ?>
        <textarea name="objetivos" id="areadetexto" cols="10" rows="12">
            <?php echo $value_objetivos?>
        </textarea></br>

        <?php
        $value_hiperlink = "";

        if (isset($hiperlink)) {
            $value_hiperlink = $hiperlink;
        }
        ?>
        <input type="text" name="hiperlink" placeholder="hiperlink" maxlength="60" value="<?php echo $value_hiperlink?>"></br>

        <label for="foto"> Foto </label>
        <input name="foto" type="file"></br>

        <?php
        if (isset($reponsavel)) {
            $value_responsavel = $reponsavel;
        }
        ?>
        <input type="text" name="idResponsavel" placeholder="responsavel" maxlength="60" value="<?php echo $value_responsavel?>"></br>

        <input type="submit" name="CriarCurso" value="CriarCurso">
    </form>
</div>