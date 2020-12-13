<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name')?></title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/reset.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/normalize.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/grid.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/style.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/responsivel.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/simple-slide.css">
</head>

<body>
  <!-- Header e Menu-->
  <header>
    <div class="container header">
      <div class="grid-7">
        <a href="#" class="logo">
          <img src="<?php echo get_template_directory_uri()?>/img/INNOVARE ODONTO-02- branco.png" alt="">
        </a>
      </div>
      <div class="grid-9 menu">
        <nav>
          <ul>
            <li><a href="#sobre">Sobre</a></li>
            <li><a href="#clinica">Clinica</a></li>
            <li><a href="#equipe">Equipe</a></li>
            <li><a href="#contato">Contato</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <script>document.documentElement.classList.add("js");</script>
    <?php wp_head();?>
  </header>