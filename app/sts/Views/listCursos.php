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

        require './CursoModel.php';

        $listarCursos = new Cursos();

        $result_cursos = $listarCursos->listar();
    
        foreach($result_cursos as $row_curso){
            //var_dump($row_curso);
            extract($row_curso);

            echo "ID do curso $idCurso <br>";
            echo "nome do curso $nomeCurso <br>";
            echo "descricao do curso $descricao<br>";
            echo "objetivos do curso $objetivos <br>";
            echo "objetivos do curso $hiperlink <br>";
        }

    ?>
</body>
</html>