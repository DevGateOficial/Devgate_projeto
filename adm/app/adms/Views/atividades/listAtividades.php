<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}


// VER COMO VAI FICAR ESSA EXIBIÇÃO DOS CURSOS



foreach ($this->data['listAtividades'] as $atividades) :
    echo "<hr>";
    extract($atividades);

    echo "ID: $idAtividade <br>";
    echo "Nome da atividade: $nomeAtividade <br>";
    echo "Descrição: $descricao <br>";
    echo "Url: $url <br>";
    echo "Id da aula: $idAula <br>";

    
    echo "<a href='" . URLADM . "view-atividade/index/$idAtividade'> Visualizar </a><br>";
    
    echo "<a href='" . URLADM . "delete-atividade/index/$idAtividade'> Deletar </a><br><br>";
?>

<?php endforeach; ?>
