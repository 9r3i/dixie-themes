<?php
/* Dixie - Free and Simple CMS
 * Created by Luthfie a.k.a. 9r3i
 * luthfie@y7mail.com
 */

/* Use an extension */
include_once('extension/function.php');

/* Include content header */
include_once('header.php');

/* View content body */
?>

<div class="title">
  <h2><?php get_post_detail('title'); ?></h2>
</div>

  <?php dixie_get_detail(); ?>

<div class="content">    
  <?php
  $picture = get_post_detail('picture',false); 
  if(!empty($picture)&&file_exists($picture)){
    echo '<div class="post-picture" id="post_picture_'.get_post_detail('aid',false).'">';
    echo '<img src="'.WWW.$picture.'" width="100%" />';
    echo '</div>';
  }
  ?>
  <?php get_post_detail('content'); ?>
  <div class="clear-both"></div>
</div>

<?php
/* Include content footer */
include_once('footer.php');