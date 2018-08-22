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

  <style>
    .index_gallery_background {
        background-color:rgb(255, 247, 153) !important;
        background-image: url("<?php echo get_template_directory_uri() . '/image/small/index_gallery_left.png'?>"), url("<?php echo get_template_directory_uri() . '/image/small/index_gallery_right_cut.png'?>"), url("<?php echo get_template_directory_uri() . '/image/index_bg.png'?>");
        background-repeat: no-repeat, no-repeat, no-repeat;
        background-position: left bottom, right bottom, center 10%;
        background-size: auto 60%, auto 60%, 100% auto;
        margin-top: 1px;
        width: 100%;
        height: 70% !important;
        margin-top: 60px;
    }
  </style>
</head>
<body>
  <div>
      <div class="container container_background">
          <div class="row" style="height:160px;">
          <a href="<?php echo get_site_url();?>">
              <div class="col s6" style="height:100%;background-image: url('<?php echo get_template_directory_uri()."/image/small/logo.png";?>');background-repeat:no-repeat; background-size: auto 100%; background-position: 30% center;">
              </div>
          </a>
          <div class="col s6" style="display: flex;height:100%;background-image: url('<?php echo get_template_directory_uri()."/image/logo_left.png";?>');background-repeat:no-repeat; background-size: auto 100%;">
            <div style="text-align:center; width: 100%; align-self: flex-end; font-size:24px; text-shadow: 0px 0px 3px gray; color:white; font-family: cwTeXFangSong, serif;">
              <b><?php echo bloginfo('description');?></b>
            </div>
          </div>
          </div>
      </div>
  </div>

  <?php 
    if(function_exists("displaySideBar")){
      displaySideBar();
    }
  ?>

  <?php
    if(function_exists("displayNavBar")){
      displayNavBar();
    }
  ?>

  