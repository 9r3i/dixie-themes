<?php
/* load header theme */
include_once('header.php');

/* set post detail */
$dts = dt_post_detail(false);
$detail = $dts?'<div class="clist-detail">'.$dts.'</div>':'';

/* html view */
?>
<div class="clist">
  <div class="clist-title"><h2><?php dt_post_title(); ?></h2></div>
  <?php print($detail); ?>
  <div class="clist-content"><?php dt_post_content(); ?><div style="clear:both;"></div></div>
</div>
<?php
/* load footer theme */
include_once('footer.php');