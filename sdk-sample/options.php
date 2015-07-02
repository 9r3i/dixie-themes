<?php
/* SDK-Sample Theme
 * Authored by Luthfie a.k.a. 9r3i
 * luthfie@y7mail.com
 * filename: options.php
 */


if(isset($_POST['submit'])){
  unset($_POST['submit']);
  $set = set_theme_option('sdk-sample',$_POST);
  echo '<meta http-equiv="refresh" content="0; url='.WWW.'admin/theme-option?name=sdk-sample&status='.(($set)?'updated':'failed').'" />';
}
?>

<style type="text/css" media="screen">
.clist{
  padding:0px 0px 10px;
  margin:0px 0px 10px 0px;
  box-shadow:0px 0px 10px #59d;
  border-radius:10px;
}
.clist-title{
  background-color:#59d;
  color:#fff;
  padding:10px;
  margin:0px 0px 0px;
  border-radius:10px 10px 0px 0px;
  font-weight:bold;
}
.clist-title h2{margin:0px;}
.clist-content{
  margin:0px;
  padding:10px;
}
.clist-detail{
  background-color:#bdf;
  margin:0px;
  padding:7px;
  font-size:90%;
}
.sdk-select{
  border:1px solid #bbb;
  padding:5px;
  margin:0px;
}
.sdk-submit{
  border:0px none;
  background-color:#59d;
  color:#fff;
  padding:5px 9px;
  margin:0px;
}
.sdk-submit:hover{background-color:#48c;}
</style>

<div class="clist">
  <div class="clist-title">Theme Sample with SDK</div>
  <div class="clist-content">
    <form action="" method="post">
      <span>Sidebar</span>
      <select name="sidebar" class="sdk-select">
        <option value="right">Right</option>
        <option value="left"<?php echo get_theme_option('sdk-sample','sidebar')=='left'?' selected="selected"':''; ?>>Left</option>
      </select>
      <input type="submit" value="Save" name="submit" class="sdk-submit" />
    </form>
  </div>
</div>