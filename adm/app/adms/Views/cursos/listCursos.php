<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/08626bfbba.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= URL; ?>assets/css/nav_bar.css" />
  <link rel="stylesheet" href="<?= URL; ?>assets/css/list-curso.css" />

  <title>nav_bar</title>
</head>

<body>
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
        <li><a href="">Home</a></li>
        <li><a href="">Html</a></li>
        <li><a href="">Java</a></li>
        <li><a href="">Css</a></li>
        <li><a href="">Sobre</a></li>
        <li class="login-mobile">
          <a href="register-form.html">
            <img src="<?= URL; ?>assets/img/user 1.svg" alt="Delineado de uma pessoa" />
            Login
          </a>
        </li>
      </ul>

      <ul class="desktop-list">
        <li><a href="">Home</a></li>
        <li>
          <a href="" class="bar"></a>
          <a href="">Html</a>
        </li>
        <li><a href="">Java</a></li>
        <li><a href="">Css</a></li>
        <li><a href="">Sobre</a></li>
      </ul>

      <div class="login-btn">
        <a href="register-form.html">
          <img src="<?= URL; ?>assets/img/user 1.svg" alt="Delineado de uma pessoa" />
        </a>
      </div>
    </nav>
  </header>

  <main>
    <div class="explainer">
      <!-- Titulo da página -->
      <h2>Cursos</h2>
      <!-- Explicação da Página -->
      <p>
        Aqui você vai encontra todos os cursos que temos a sua disposição na
        plataforma
      </p>
    </div>

    <?php
    foreach ($this->data['listCursos'] as $curso) :
        extract($curso);
    ?>

      <div class="desktop-view">
        <div class="curso">
          <img src="<?= URL; ?>assets/img/html.png" alt="" />
          <div class="left-text">
            <h4><?= $nomeCurso ?></h4>
            <p>
              Descrição: <?= $descricao ?>
            </p>
            <a href='<?=URLADM;?>view-curso/index/<?=$idCurso;?>'> Visualizar </a><br>
          </div>
        </div>

        <hr/>

      <?php endforeach; ?>

      <!-- <div class="curso">
          <img src="<?= URL; ?>assets/img/java.png" alt="" />
          <div class="left-text">
            <h4>Java e Orientação a Objeto</h4>
            <p>
              Descrição: Curso que vai do básico ao intermediario, para pessoas
              que possuem nenhum ou pouco conhecimento na area. Ensino baseado
              em projetos basicos e práticos
            </p>
          </div>
        </div>

        <hr />

        <div class="curso">
          <img src="<?= URL; ?>assets/img/java.png" alt="" />
          <div class="left-text">
            <h4>CSS e Estilização de Páginas</h4>
            <p>
              Descrição: Curso que vai do básico ao intermediario, para pessoas
              que possuem nenhum ou pouco conhecimento na area. Ensino baseado
              em projetos basicos e práticos
            </p>
          </div>
        </div> -->
      </div>
  </main>
</body>

</html>