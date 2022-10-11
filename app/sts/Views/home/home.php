<?php 

    // Redireciona ou para o processamento quando o usuário não acessa o arquivo index.php

    //use Sts\Controllers\Usuario;

    if(!defined('D3V3G4T3')){
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }

    echo "<h1> Página Inicial </h1><bR>";

    //var_dump($this->data);

    if(!empty($this->data[0])){
        
        extract($this->data[0]);

        echo "ID: $idCurso <br>";
        echo "Nome: $nomeCurso <br>";
        echo "Descricão: $descricao <br>";
        echo "Objetivos: $objetivos <br>";
        echo "Hiperlink: $hiperlink <br>";
    }
    else{
        echo "<p style='color: #f00;'> Erro: Nenhum registro encontrado!</p>";
    }
?>

<button type="button" id="CadastroCurso"> Cadastrar Curso </button>

<button type="button" id="CadastroUsuario"> Cadastrar Usuario </button>

<script>
    let cadastrarCurso = document.getElementById('CadastroCurso');

    let cadastrarUsuario = document.getElementById('CadastroUsuario');

    let url = window.location.href;

    cadastrarCurso.addEventListener('click', function(e){
       window.location.replace(url + "Curso");
       console.log(url);
    })

    cadastrarUsuario.addEventListener('click', function(e){
        window.location.replace(url + "Usuario");
    })
</script>