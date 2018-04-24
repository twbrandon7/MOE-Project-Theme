<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>
<body>
	<!-- Navigation -->
  <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="<?php if(is_user_logged_in()):?>margin-top:32px;<?php endif;?>" id="mainNav">
    <div class="row" style="width: 100%;">
      <div class="col-md-12">
        <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
      </div>
      <div class="col-md-12">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <?php
          if(function_exists("custom_nav")){
            custom_nav();
          }
        ?>
      </div>
    </div>        
  </nav> -->

  <div style="background-color:rgb(250, 205, 137);">
      <div class="container">
          <div class="row" style="height:160px;">
          <a href="<?php echo get_site_url();?>">
              <div class="col s6" style="height:100%;background-image: url('<?php echo get_template_directory_uri()."/image/logo.png";?>');background-repeat:no-repeat; background-size: auto 100%;">
              </div>
          </a>
          <div class="col s6" style="height:100%;background-image: url('<?php echo get_template_directory_uri()."/image/logo_left.png";?>');background-repeat:no-repeat; background-size: auto 100%;">
          </div>
          </div>
      </div>
  </div>

  <!-- <ul id="dropdown1" class="dropdown-content">
    <li><a href="http://langcenter.niu.edu.tw/?page_id=28">Meet the Teachers</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=60">Meet the TAs</a></li>
  </ul>
  <ul id="dropdown1_" class="dropdown-content">
    <li><a href="http://langcenter.niu.edu.tw/?page_id=28">Meet the Teachers</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=60">Meet the TAs</a></li>
  </ul>

  <ul id="dropdown2" class="dropdown-content">
    <li><a href="http://langcenter.niu.edu.tw/?page_id=77">Target</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=93">Program</a></li>
  </ul>
  <ul id="dropdown2_" class="dropdown-content">
    <li><a href="http://langcenter.niu.edu.tw/?page_id=77">Target</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=93">Program</a></li>
  </ul>

  <ul id="dropdown3" class="dropdown-content">
    <li><a href="http://langcenter.niu.edu.tw/?page_id=107">職場英與</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=111">在地關懷與英文敘事力培養</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=114">中英商務隨行口譯</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=117">英文筆譯實務</a></li>
  </ul>
  <ul id="dropdown3_" class="dropdown-content">
    <li><a href="http://langcenter.niu.edu.tw/?page_id=107">職場英與</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=111">在地關懷與英文敘事力培養</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=114">中英商務隨行口譯</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=117">英文筆譯實務</a></li>
  </ul>

  <ul id="dropdown5" class="dropdown-content">
    <li><a href="http://langcenter.niu.edu.tw/?page_id=217">在地關懷與英文敘事力培養 - 課堂照片</a></li>
  </ul>
  <ul id="dropdown5_" class="dropdown-content">
    <li><a href="http://langcenter.niu.edu.tw/?page_id=217">在地關懷與英文敘事力培養 - 課堂照片</a></li>
  </ul>

  <ul id="dropdown6" class="dropdown-content">
    <li><a href="http://langcenter.niu.edu.tw/?p=157">106-1 課程相關演講</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?p=252">E-Learning : Resume Writing</a></li>
  </ul>
  <ul id="dropdown6_" class="dropdown-content">
    <li><a href="http://langcenter.niu.edu.tw/?p=157">106-1 課程相關演講</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?p=252">E-Learning : Resume Writing</a></li>
  </ul>

  <ul id="dropdown7" class="dropdown-content">
    <li><a href="https://www.facebook.com/groups/1451076115013711/">職場英語</a></li>
    <li><a href="https://www.facebook.com/groups/1733067236995143/">跨國共學共教</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=163">元智宜大相見歡</a></li>
  </ul>
  <ul id="dropdown7_" class="dropdown-content">
    <li><a href="https://www.facebook.com/groups/1451076115013711/">職場英語</a></li>
    <li><a href="https://www.facebook.com/groups/1733067236995143/">跨國共學共教</a></li>
    <li><a href="http://langcenter.niu.edu.tw/?page_id=163">元智宜大相見歡</a></li>
  </ul> -->

  <?php 
    if(function_exists("displaySideBar")){
      displaySideBar();
    }
  ?>

  <!-- <nav class="lighten-1" style="background-color:rgb(89, 73, 63);height:50px;line-height:50px;margin-top:-20px;" role="navigation">
      <div class="nav-wrapper container">
          <div>

          <ul class="hide-on-med-and-down">
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Teaching Team<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Course Info &amp; Objectives<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown3">Course Group<i class="material-icons right">arrow_drop_down</i></a></li>
            <li>Homework Display</li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown5">Photo Gallery<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown6">Materials<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown7">Forum<i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>

          <ul id="nav-mobile" class="sidenav">
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1_">Teaching Team<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown2_">Course Info &amp; Objectives<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown3_">Course Group<i class="material-icons right">arrow_drop_down</i></a></li>
            <li>Homework Display</li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown5_">Photo Gallery<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown6_">Materials<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown7_">Forum<i class="material-icons right">arrow_drop_down</i></a></li>

          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger">
              <i class="material-icons">menu</i>
              
          </a>
          </div>
      </div>
  </nav> -->
  <?php
    if(function_exists("displayNavBar")){
      displayNavBar();
    }
  ?>

  