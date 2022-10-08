<?php
    // Redirecionar ou para o processamento quando o usuário não acessa o arquivo index.php
    if (!defined('D3V3G4T3')) { 
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <!-- <link rel="stylesheet" href="Templates/styleLogin.css"/>
            <link rel="preconnect" href="https://fonts.googleapis.com"/>
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigind/>
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;800&display=swap" rel="stylesheet"/> -->
        <title>Cadastro - DevGate</title>
    </head>
    <body>
        <main>
            <section class="text">
                <h1>DevGate</h1>
                <p>
                Entre nesse portal <br />
                e aprenda a <br />
                programar
                </p>
            </section>
            <div id=form>
                <h1>Cadastro>
                    <form method="POST" action="">
                        <input type="text" name="nomeUsuario" id="" placeholder="Nome Usuário" maxlength="30">
                        </br>
                        <input type="text" name="nomeCompleto" id="" placeholder="Nome Completo" maxlength="120"> 
                        </br>
                        <input type="email" name="email" id="" placeholder="devgate@sicdev.com" maxlength="60"> 
                        </br>
                        <input type="password" name="senha" id="" placeholder="Senha" minlength="8" maxlength="30">
                        </br>
                        <input type="date" name="dtUsuario">
                        </br>
                        <input type="submit" name="Cadastrar" value="Cadastrar">
                    </form>
            </div>
        </main>
    </body>
</html>

