<?php

echo "VIEW - Página Dashboard! <br>";
echo $this->data . " " . $_SESSION['user_nomeCompleto'] . "!<br>";

echo "<a href='" . URLADM . "login'> Sair </a><br>";