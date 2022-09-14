<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Listagem de cursos </title>
</head>
<body>
    <?php

        require './App/Models/CursoModel.php';

        $listarCursos = new Cursos();

        $result_cursos = $listarCursos->listar();
    
        foreach($result_cursos as $row_curso){
            extract($row_curso);
        }

    ?>
</body>
</html>