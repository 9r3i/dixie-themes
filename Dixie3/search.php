<?php
/* Dixie - Free and Simple CMS
 * Created by Luthfie a.k.a. 9r3i
 * luthfie@y7mail.com
 */

$result = get_search_result();

/* Include content header */
include_once('header.php');

/* View content body */
?>
<div class="title"><h2><?php get_title(); ?></h2></div>
<div class="form-search">
  <div class="form-search-content"><form action="<?php print(WWW); ?>search" method="get">
    <div class="form-search-left"><input class="form-search-input" name="keywords" type="text" id="sidear_search" placeholder="Search..." /></div>
    <div class="form-search-right"><input class="form-search-submit" value="Search" type="submit" id="sidear_search_submit" /></div>
  </form></div>
</div>

<div class="search-result">
<?php
if(count($result)>0){
  foreach($result as $id=>$res){
    echo '<a href="'.$res['url'].'" title="'.$res['title'].'"><div class="search-result-each">'.strip_tags($res['title'],'<strong>').'</div></a>';
  }
}elseif(isset($_GET['keywords'])){
  echo '<div class="search-result-each">Empty result...</div>';
}
?>
</div>

<?php
/* Include content footer */
include_once('footer.php');