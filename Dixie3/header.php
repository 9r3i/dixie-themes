<!DOCTYPE html>
<html lang="en-US">
  <head>
    <?php get_header(); ?>
    <link rel="shortcut icon" href="<?php printf(WWW); ?>themes/Dixie3/images/dixie-black.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php printf(WWW); ?>themes/Dixie3/style.css?v=3.01" type="text/css" />
  <?php
  $picture = get_post_detail('picture',false); 
  if(is_file($picture)&&file_exists($picture)){
    echo '<meta content="'.WWW.$picture.'" property="og:image" />';
  }else{
    echo '<meta content="'.WWW.'themes/Dixie3/images/dixie-black.png" property="og:image" />';
  }
  ?>
    <style type="text/css">
      .header-logo{
        background-image:url('<?php if(get_theme_option('Dixie3','header-image')!==''){echo get_theme_option('Dixie3','header-image');}else{echo WWW.'themes/Dixie3/images/dixie-black-logo.png';} ?>');
        background-repeat:no-repeat;
        background-color:transparent;
      }
      body{
        background-image:url('<?php if(get_theme_option('Dixie3','background-image')!==''){echo get_theme_option('Dixie3','background-image');}else{echo 'themes/Dixie3/images/galaxy-fairy-starry-sky.gif';} ?>');
        background-repeat:<?php if(get_theme_option('Dixie3','background-repeat')=='yes'){echo 'repeat';}else{echo 'no-repeat';} ?>;
        background-attachment:<?php echo get_theme_option('Dixie3','background-position'); ?>;
        background-position: top center;
      }
      .sidebar-text-title,.sidebar-recent-title,.sidebar-menu-title{display:<?php echo (get_theme_option('Dixie3','sidebar-title')=='yes')?'block':'none'; ?>;}
    </style>
  </head>
  <body>
    <header><div class="header" id="header"><div class="header-inside">
      <a href="<?php print(WWW); ?>" title="<?php if(get_theme_option('Dixie3','header-name')!==''){echo get_theme_option('Dixie3','header-name');}else{get_site_info('site_name');} ?>">
      <div class="header-logo"></div>
      <div class="header-title">
        <h1><?php if(get_theme_option('Dixie3','header-name')!==''){echo get_theme_option('Dixie3','header-name');}else{get_site_info('site_name');} ?></h1>
      </div>
      </a>
      <div id="menu_button" onclick="top_menu()" title="Menu">
        <div class="menu-button-strip"></div>
        <div class="menu-button-strip"></div>
        <div class="menu-button-strip"></div>
      </div>
      <nav><div id="nav">
        <?php get_menu_print('top'); ?>
      </div></nav>
    </div></div></header>
    <div class="clear-both"></div>
    <div class="tubuh">
      <div class="body">
        <div class="body-right">