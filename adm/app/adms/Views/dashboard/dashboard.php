<?php

echo "VIEW - Página Dashboard! <br>";
echo $this->data . " " . $_SESSION['user_nomeCompleto'] . "!<br>";

echo "<a href='" . URLADM . "list-users/index'> Ver Usuários </a><br>";
echo "<a href='" . URLADM . "list-cursos/index'> Ver Cursos </a><br>";

echo "<a href='" . URLADM . "logout/index'> Sair </a><br><br><br><br>";


