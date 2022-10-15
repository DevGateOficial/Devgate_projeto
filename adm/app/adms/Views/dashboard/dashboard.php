<?php

echo "VIEW - Página Dashboard! <br>";
echo $this->data . " " . $_SESSION['user_nomeCompleto'] . "!<br>";

echo "<a href='" . URLADM . "logout/index'> Sair </a><br>";