<?php
/* load header theme */
include_once('header.php');

/* check request */
$keywords = isset($_GET['keywords'])?$_GET['keywords']:'';

/* print html */
?>
<div class="clist">
  <div class="clist-title">Search result of <?php print($keywords); ?></div>
  <div class="clist-content"><?php dt_result(); ?></div>
</div>
<?php
/* load footer theme */
include_once('footer.php');