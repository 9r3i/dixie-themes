<?php
/* use dixie theme sdk */
require_once('sdk/dtsdk.php');

/* html view */
?><!doctype html><html lang="en-US"><head>
  <?php dt_header(); ?>
  <link href="themes/sdk-sample/style.css" rel="stylesheet" type="text/css" media="screen,print" />
</head><body><div id="content">
  <header><div id="header"><h1><a href="<?php dt_www(); ?>"><?php dt_site_name(); ?></a></h1></div></header>
  <div style="clear:both;"></div>
  <nav><div id="menu"><?php dt_menu(); ?></div></nav>
  <div style="clear:both;"></div>
  <div class="content">
    <?php if(get_theme_option('sdk-sample','sidebar')=='left'){ ?>
    <div id="sidebar"><?php dt_sidebar(); ?></div>
    <?php } ?>
    <div id="body">
