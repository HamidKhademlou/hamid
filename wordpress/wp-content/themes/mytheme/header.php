<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    <?php bloginfo('name'); ?>
  </title>
  <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <?php wp_head(); ?>
</head>

<body>
  <!-- <nav class="navbar navbar-expand-lg navbar-inverse fixed-top navbar-light bg-light"> -->
  <!-- <a class="navbar-brand" href="#">MINIMQ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="myNavbar" class="collapse navbar-collapse m-3">
      <ul class="nav navbar-nav navbar-right">
        <li itemscope="itemscope" class="menu-item nav-item"><a href="" class="nav-link">lifestyle</a></li>
        <li itemscope="itemscope" class="menu-item nav-item"><a href="" class="nav-link">music</a></li>
        <li itemscope="itemscope" class="menu-item nav-item"><a href="" class="nav-link">photo diary</a></li>
        <li itemscope="itemscope" class="menu-item nav-item"><a href="" class="nav-link">travel</a></li>
      </ul>
    </div> -->

  <nav class="navbar-expand-lg navbar-light bg-light">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'header-menu',
      'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
      'container' => 'div',
      'container_class' => 'collapse navbar-collapse',
      'container_id' => 'topnav',
      'menu_class' => 'navbar-nav mr-auto',
      'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
      'walker' => new WP_Bootstrap_Navwalker(),
    ));
    ?>
  </nav>