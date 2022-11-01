<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']); 
}


foreach ($this->data['listUsers'] as $usuario):
    extract($usuario);

    echo "ID: $idUsuario <br>";
    echo "Nome do usuário: $nomeUsuario <br>";
    echo "Email: $email <br>";

    echo "<a href='".URLADM."view-users/index/$idUsuario'> Visualizar </a><br>";
    echo "<a href='".URLADM."edit-users/index/$idUsuario'> Editar </a><br><br>";

    echo "<hr>";

    endforeach;
?>
