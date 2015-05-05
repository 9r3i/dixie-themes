<?php
/* Dixie - Free and Simple CMS
 * Created by Luthfie a.k.a. 9r3i
 * luthfie@y7mail.com
 */

/* Use an extension */
include_once('extension/function.php');

/* View HTML */
?>
<!DOCTYPE html><html lang="en-US"><head>
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
  <link href="<?php printf(WWW); ?>themes/Dixie3/fancybox/fancybox-1.3.4.css" type="text/css" rel="stylesheet" />
  <link href="<?php printf(WWW); ?>themes/Dixie3/fancybox/gallery.css?v=1.0" type="text/css" rel="stylesheet" />
</head><body>
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

<div class="title">
  <h2><?php get_post_detail('title'); ?></h2>
</div>
<div class="content">   
  <?php get_post_detail('content'); ?>
  <div class="clear-both"></div>
</div>

<script type="text/javascript">
var imgs = document.getElementsByTagName('img');
for(var i=0;i<imgs.length;i++){
  var image = imgs[i].getAttribute('src');
  var style = imgs[i].getAttribute('style');
  var rel = document.createElement('a');
  rel.setAttribute('rel','gallery_fancybox');
  rel.setAttribute('href',image);
  rel.setAttribute('title','');
  var img = document.createElement('img');
  img.setAttribute('src',image);
  img.setAttribute('alt','');
  img.setAttribute('title','');
  img.setAttribute('rel','');
  img.setAttribute('style',style);
  rel.appendChild(img);
  imgs[i].parentNode.insertBefore(rel,imgs[i].nextSibling);
  imgs[i].parentElement.removeChild(imgs[i]);
}
</script>

      </div><!-- End of class body-right -->
      <div class="body-left">
        <aside>
          <div id="sidebar">
            <?php get_sidebar_print(); ?>
          </div>
        </aside>
      </div><!-- End of class body-left -->
      <div class="clear-both"></div>
    </div><!-- End of class body -->
  </div><!-- End of class tubuh -->
  <div id="loading"><div class="loader-image"></div></div>
  <div id="scroller" onclick="scroll_top('header')"></div>
  <footer>
    <div class="footer">
      <div class="footer-inside">
        <?php get_footer(); ?>
      </div>
    </div>
  </footer>
  <script src="<?php printf(WWW); ?>themes/Dixie3/fancybox/jquery.1.4.4.min.js" type="text/javascript"></script>
  <script src="<?php printf(WWW); ?>themes/Dixie3/fancybox/jquery.fancybox-1.3.4.js" type="text/javascript"></script>
  <script src="<?php printf(WWW); ?>themes/Dixie3/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
  <script src="<?php printf(WWW); ?>themes/Dixie3/fancybox/jquery.mousewheel-3.0.4.pack.js" type="text/javascript"></script>
  <script type="text/javascript">
  (function($){
    $(document).ready(function(){
      $("a[rel=gallery_fancybox]").fancybox({
		'transitionIn'		: 'elastic',
		'transitionOut'		: 'elastic',
		'titlePosition' 	: 'inside',
		'speedIn'			: 300, 
		'speedOut'			: 200,
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
			//return '<span id="fancybox-title-inside">' + (title.length ? title + '<br />' : '') + ' + ' + (currentIndex + 1) + ' / ' + currentArray.length + '</span>';
		}
	  });
    });
  })(jQuery);
  </script>
  <script src="<?php printf(WWW); ?>themes/Dixie3/js/dixie.js" type="text/javascript"></script>
</body></html>


