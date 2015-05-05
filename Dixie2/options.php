<?php
/* Black Apple Inc.
 * http://black-apple.biz/
 * Dixie CMS
 * Created by Luthfie
 * luthfie@y7mail.com
 */

/* Theme option
 * Theme name: Dixie 2
 * CMS: Dixie CMS
 */


@include_once('include.php');

if(isset($_POST['header-image'])){
  $set = set_theme_option('Dixie2',$_POST);
  echo '<meta http-equiv="refresh" content="0; url='.WWW.'admin/theme-option?name=Dixie2&status='.(($set)?'update':'failed').'" />';
}

$scan = dixie_explore('file','upload');

?>
<style type="text/css">
.option-tags{
  margin:0px;
  padding:10px;
  border:3px dashed #c33;
  font-size:13px;
}
.option-data-input{display:inline-block;}
.option-each{margin:0px;padding:10px 0px;border-bottom:1px solid #bbb;}
.option-each-submit{margin:0px;padding:10px 0px 10px 25%;}
.option-label{display:inline-block;width:30%;padding-right:10px;}
.option-data{display:inline-block;width:60%;}
.option-input{
  width:95%;
  border:1px solid #999;
  padding:5px 5px;
  margin:5px 0px;
  font-size:13px;
}
.option-select{
  width:100%;
  border:1px solid #999;
  padding:5px 5px;
  margin:5px 0px;
  font-size:13px;
  margin-left:-5px;
}
.option-submit{
  margin:0px 0px 0px;
  padding:5px 7px;
  background-color:#b22;
  color:#fff;
  font-size:15px;
  border:0px none;
  cursor:pointer;
}
.option-submit:hover{background-color:#900;}
.option-submit:focus{background-color:#700;}
</style>
<div class="option-tags"><form action="" method="post">
  <div class="option-each">
    <div class="option-label">Header Name</div><div class="option-data"><input type="text" name="header-name" class="option-input" value="<?php tprint(get_theme_option('Dixie2','header-name')); ?>" placeholder="Empty will set as Site Name" /></div>
  </div>
  <div class="option-each">
    <div class="option-label">Header Image</div>
    <div class="option-data">
      <select name="header-image" class="option-select">
        <option value="">-- Default --</option>
        <?php
        if(is_array($scan)){
          foreach($scan as $file){
            $name = $file;
            echo '<option value="'.$name.'"'.(($name==get_theme_option('Dixie2','header-image'))?' selected="true"':'').'>'.$name.'</option>';
          }
        }
        ?>
      </select>
    </div>
  </div>
  <div class="option-each">
    <div class="option-label">Background Image</div>
    <div class="option-data">
      <select name="background-image" class="option-select">
        <option value="">-- Default --</option>
        <?php
        if(is_array($scan)){
          foreach($scan as $file){
            $name = $file;
            echo '<option value="'.$name.'"'.(($name==get_theme_option('Dixie2','background-image'))?' selected="true"':'').'>'.$name.'</option>';
          }
        }
        ?>
      </select>
    </div>
  </div>
  <div class="option-each">
    <div class="option-label">Background Repeat</div>
    <div class="option-data">
      <select name="background-repeat" class="option-select">
        <option value="yes">-- Yes --</option>
        <option value="no"<?php echo (get_theme_option('Dixie2','background-repeat')=='no')?' selected="true"':''; ?>>-- No --</option>
      </select>
    </div>
  </div>
  <div class="option-each">
    <div class="option-label">Background Position</div>
    <div class="option-data">
      <select name="background-position" class="option-select">
        <option value="scroll">Scroll</option>
        <option value="fixed"<?php echo (get_theme_option('Dixie','background-position')=='fixed')?' selected="true"':''; ?>>Fixed</option>
      </select>
    </div>
  </div>
  <div class="option-each">
    <div class="option-label">Show Sidebar Title</div>
    <div class="option-data">
      <select name="sidebar-title" class="option-select">
        <option value="yes">Yes</option>
        <option value="no"<?php echo (get_theme_option('Dixie2','sidebar-title')=='no')?' selected="true"':''; ?>>No</option>
      </select>
    </div>
  </div>
  <div class="option-each">
    <div class="option-label">Post Per Page</div>
    <div class="option-data">
      <select name="post-per-page" class="option-select">
        <?php
        for($r=1;$r<=10;$r++){
          $r5 = $r*5;
          echo '<option value="'.$r5.'" '.((get_theme_option('Dixie2','post-per-page')==$r5)?' selected="true"':'').'>'.$r5.'</option>';
        }
        ?>
      </select>
    </div>
  </div>
  <div class="option-each-submit">
    <input type="submit" class="option-submit" value="Save" />
  </div>
</form></div>
