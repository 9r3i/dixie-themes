<?php
/* Dixie - Free and Simple CMS
 * Created by Luthfie a.k.a. 9r3i
 * luthfie@y7mail.com
 */

/* Theme option
 * Theme name: Dixie 3 (Default)
 * CMS: Dixie CMS
 */


@include_once('include.php');

if(isset($_POST['header-image'])){
  $set = set_theme_option('Dixie3',$_POST);
  echo '<meta http-equiv="refresh" content="0; url='.WWW.'admin/theme-option?name=Dixie3&status='.(($set)?'update':'failed').'" />';
}

$scan = dixie_explore('file','upload');

?>
<style type="text/css">
.option-tags{
  margin:0px;
  padding:10px;
  border:3px dashed #bbb;
  font-size:13px;
}
.option-data-input{display:inline-block;}
.option-each{margin:0px;padding:10px 0px;border-bottom:1px solid #bbb;}
.option-label{width:145px;min-width:145px;max-width:145px;padding-right:10px;}
.option-data{width:90%;}
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
}
.option-submit{
  margin:0px 0px 0px;
  padding:5px 7px;
  background-color:#333;
  color:#fff;
  font-size:15px;
  border:0px none;
  cursor:pointer;
}
.option-submit:hover{background-color:#222;}
.option-submit:focus{background-color:#111;}

.table-option-dixie3 td{vertical-align:middle;}
</style>
<div class="option-tags"><form action="" method="post"><table class="table-option-dixie3" border="0" width="100%"><tbody>

  <tr class="option-each">
    <td class="option-label">Header Name</td>
    <td class="option-data"><input type="text" name="header-name" class="option-input" value="<?php tprint(get_theme_option('Dixie3','header-name')); ?>" placeholder="Empty will set as Site Name" /></td>
  </tr>
  <tr class="option-each">
    <td class="option-label">Header Image</td>
    <td class="option-data">
      <select name="header-image" class="option-select">
        <option value="">-- Default --</option>
        <?php
        if(is_array($scan)){
          foreach($scan as $file){
            $name = $file;
            echo '<option value="'.$name.'"'.(($name==get_theme_option('Dixie3','header-image'))?' selected="true"':'').'>'.$name.'</option>';
          }
        }
        ?>
      </select>
    </td>
  </tr>
  <tr class="option-each">
    <td class="option-label">Background Image</td>
    <td class="option-data">
      <select name="background-image" class="option-select">
        <option value="">-- Default --</option>
        <?php
        if(is_array($scan)){
          foreach($scan as $file){
            $name = $file;
            echo '<option value="'.$name.'"'.(($name==get_theme_option('Dixie3','background-image'))?' selected="true"':'').'>'.$name.'</option>';
          }
        }
        ?>
      </select>
    </td>
  </tr>
  <tr class="option-each">
    <td class="option-label">Background Repeat</td>
    <td class="option-data">
      <select name="background-repeat" class="option-select">
        <option value="yes">-- Yes --</option>
        <option value="no"<?php echo (get_theme_option('Dixie3','background-repeat')=='no')?' selected="true"':''; ?>>-- No --</option>
      </select>
    </td>
  </tr>
  <tr class="option-each">
    <td class="option-label">Background Position</td>
    <td class="option-data">
      <select name="background-position" class="option-select">
        <option value="scroll">Scroll</option>
        <option value="fixed"<?php echo (get_theme_option('Dixie3','background-position')=='fixed')?' selected="true"':''; ?>>Fixed</option>
      </select>
    </td>
  </tr>
  <tr class="option-each">
    <td class="option-label">Show Sidebar Title</td>
    <td class="option-data">
      <select name="sidebar-title" class="option-select">
        <option value="yes">Yes</option>
        <option value="no"<?php echo (get_theme_option('Dixie3','sidebar-title')=='no')?' selected="true"':''; ?>>No</option>
      </select>
    </td>
  </tr>
  <tr class="option-each">
    <td class="option-label">Post Per Page</td>
    <td class="option-data">
      <select name="post-per-page" class="option-select">
        <?php
        for($r=1;$r<=10;$r++){
          $r5 = $r*5;
          echo '<option value="'.$r5.'" '.((get_theme_option('Dixie3','post-per-page')==$r5)?' selected="true"':'').'>'.$r5.'</option>';
        }
        ?>
      </select>
    </td>
  </tr>
  <tr class="option-each">
    <td class="option-label"></td>
    <td class="option-data">
      <input type="submit" class="option-submit" value="Save" />
    </td>
  </tr>

</tbody></table></form></div>
