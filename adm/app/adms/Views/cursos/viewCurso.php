<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']); 
}


foreach ($this->data['viewCursos'] as $curso) {
    var_dump($curso);
    echo "<br>";
}

?>

<h1> Salve </h1>