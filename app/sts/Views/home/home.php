<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/08626bfbba.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= URL;?>assets/css/nav_bar.css" />
    <link rel="stylesheet" href="<?= URL;?>assets/css/home-logado.css" />
    <title>NOT nav</title>
</head>

<body style="background-image: url(http://localhost/Devgate_projeto/assets/img/CTA\ Background.png);">

    <header>
        <nav>
            <div class="logo-container">
                <h2 class="logo">DevGate</h2>
            </div>
            <input type="checkbox" id="check" />
            <label for="check" class="hamburger-btn">
                <i class="fas fa-bars"></i>
            </label>

            <ul class="nav-list mobile">
                <li><a href="#">Home</a></li>
                <li><a href="#">Meus Cursos</a></li>
                <li><a href="#">Sobre</a></li>
                <li class="login-mobile">
                    <a href="">
                        <img src="<?= URL;?>assets/img/user 1.svg" alt="Delineado de uma pessoa" />
                        Login
                    </a>
                </li>
            </ul>

            <ul class="desktop-list">
                <li><a href="">Home</a></li>
                <li><a href="<?= URL;?>list-cursos">Meus Cursos</a></li>
                <li><a href="">Sobre</a></li>
            </ul>

            <div class="login-btn">
                <a href="<?= URL;?>acesso-adm/index">
                    <img src="<?= URL;?>assets/img/user 1.svg" alt="Delineado de uma pessoa" />
                </a>
            </div>
        </nav>
    </header>

    <main>
        <div class="last-class">
            <a href="">
                <div class="curso-logo">
                    <img src="<?= URL;?>assets/img/css.png" alt="" />
                    <img class="play-btn" src="<?= URL;?>assets/img/Playplay-btn.png" alt="" />
                </div>
                <h4 class="title">
                    Continuar assistindo: Fundamentos Fundamentos Fundamentos
                    Fundamentos Fundamentos Fundamentos
                </h4>
            </a>
        </div>
        <div class="last-course">
            <a href="">
                <img src="<?= URL;?>assets/img/css.png" alt="" />
            </a>
        </div>
        <div class="avisos">
            <h2 class="title">Avisos!</h2>
            <p class="desc">
                Area destinada a informar os usuarios da plataforma sobre
                atualizações, adições ou modificações quais venham a ocorrer no site
            </p>
        </div>
    </main>
</body>

</html>