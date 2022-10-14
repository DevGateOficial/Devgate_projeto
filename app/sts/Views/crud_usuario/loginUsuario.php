<?php
    // Redirecionar ou para o processamento quando o usuário não acessa o arquivo index.php
    if (!defined('D3V3G4T3')) {
        //header("Location: /");
        die("Erro: Página não encontrada!");
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./templates/styleLogin.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigind/>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;800&display=swap" rel="stylesheet"/>
        <title>Devgate</title>
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
            
            <div class="login-form">   
                <form methor="POST" action="">
                        <input type="text" name="email" placeholder="Email" maxlength="60">
                    </br>
                        <input type="password" name="senha" placeholder="Senha" minlength="8" maxlength="30">
                    </br>
                        <input class="input-btn" type="submit" name="Cadastrar" value="Cadastrar">
                        <small><a href="#">Novo? Registre-se aqui</a></small>
                    </br>
                        <small><a href="#">recuperar senha</a></small>
                </form>
            </div>          
        </main>