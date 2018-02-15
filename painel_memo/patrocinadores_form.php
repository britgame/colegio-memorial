<?php require_once('../Connections/memorial2014.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Require the MXI classes
require_once ('../includes/mxi/MXI.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_memorial2014 = new KT_connection($memorial2014, $database_memorial2014);

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_memorial2014, "../");
//Grand Levels: Any
$restrict->Execute();
//End Restrict Access To Page

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("ptr_img", true, "", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../images/patrocinadores/");
  $deleteObj->setDbFieldName("ptr_img");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("ptr_img");
  $uploadObj->setDbFieldName("ptr_img");
  $uploadObj->setFolder("../images/patrocinadores/");
  $uploadObj->setResize("true", 300, 110);
  $uploadObj->setMaxSize(2500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("custom");
  $uploadObj->setRenameRule("{ptr_id}.{KT_ext}");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_patrocinadores_ptr = new tNG_multipleInsert($conn_memorial2014);
$tNGs->addTransaction($ins_patrocinadores_ptr);
// Register triggers
$ins_patrocinadores_ptr->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_patrocinadores_ptr->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_patrocinadores_ptr->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_patrocinadores_ptr->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_patrocinadores_ptr->setTable("patrocinadores_ptr");
$ins_patrocinadores_ptr->addColumn("ptr_img", "FILE_TYPE", "FILES", "ptr_img");
$ins_patrocinadores_ptr->addColumn("ptr_link", "STRING_TYPE", "POST", "ptr_link");
$ins_patrocinadores_ptr->setPrimaryKey("ptr_id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_patrocinadores_ptr = new tNG_multipleUpdate($conn_memorial2014);
$tNGs->addTransaction($upd_patrocinadores_ptr);
// Register triggers
$upd_patrocinadores_ptr->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_patrocinadores_ptr->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_patrocinadores_ptr->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_patrocinadores_ptr->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_patrocinadores_ptr->setTable("patrocinadores_ptr");
$upd_patrocinadores_ptr->addColumn("ptr_img", "FILE_TYPE", "FILES", "ptr_img");
$upd_patrocinadores_ptr->addColumn("ptr_link", "STRING_TYPE", "POST", "ptr_link");
$upd_patrocinadores_ptr->setPrimaryKey("ptr_id", "NUMERIC_TYPE", "GET", "ptr_id");

// Make an instance of the transaction object
$del_patrocinadores_ptr = new tNG_multipleDelete($conn_memorial2014);
$tNGs->addTransaction($del_patrocinadores_ptr);
// Register triggers
$del_patrocinadores_ptr->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_patrocinadores_ptr->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_patrocinadores_ptr->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_patrocinadores_ptr->setTable("patrocinadores_ptr");
$del_patrocinadores_ptr->setPrimaryKey("ptr_id", "NUMERIC_TYPE", "GET", "ptr_id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rspatrocinadores_ptr = $tNGs->getRecordset("patrocinadores_ptr");
$row_rspatrocinadores_ptr = mysql_fetch_assoc($rspatrocinadores_ptr);
$totalRows_rspatrocinadores_ptr = mysql_num_rows($rspatrocinadores_ptr);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="../includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: false,
  merge_down_value: false
}
</script>
</head>

<body>
<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>
<table width="900" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>&nbsp;
      <?php
	echo $tNGs->getErrorMsg();
?>
      <div class="KT_tng">
        <h1>
          <?php 
// Show IF Conditional region1 
if (@$_GET['ptr_id'] == "") {
?>
            <?php echo NXT_getResource("Insert_FH"); ?>
            <?php 
// else Conditional region1
} else { ?>
            <?php echo NXT_getResource("Update_FH"); ?>
            <?php } 
// endif Conditional region1
?>
          Patrocinadores </h1>
        <div class="KT_tngform">
          <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
            <?php $cnt1 = 0; ?>
            <?php do { ?>
              <?php $cnt1++; ?>
              <?php 
// Show IF Conditional region1 
if (@$totalRows_rspatrocinadores_ptr > 1) {
?>
                <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
                <?php } 
// endif Conditional region1
?>
              <table cellpadding="2" cellspacing="0" class="KT_tngtable">
                <tr>
                  <td class="KT_th"><label for="ptr_img_<?php echo $cnt1; ?>">imagem:</label></td>
                  <td><input type="file" name="ptr_img_<?php echo $cnt1; ?>" id="ptr_img_<?php echo $cnt1; ?>" size="32" />
                    <?php echo $tNGs->displayFieldError("patrocinadores_ptr", "ptr_img", $cnt1); ?></td>
                </tr>
                <tr>
                  <td class="KT_th"><label for="ptr_link_<?php echo $cnt1; ?>">link:</label></td>
                  <td><input type="text" name="ptr_link_<?php echo $cnt1; ?>" id="ptr_link_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rspatrocinadores_ptr['ptr_link']); ?>" size="32" maxlength="250" />
                    <?php echo $tNGs->displayFieldHint("ptr_link");?> <?php echo $tNGs->displayFieldError("patrocinadores_ptr", "ptr_link", $cnt1); ?></td>
                </tr>
              </table>
              <input type="hidden" name="kt_pk_patrocinadores_ptr_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rspatrocinadores_ptr['kt_pk_patrocinadores_ptr']); ?>" />
              <?php } while ($row_rspatrocinadores_ptr = mysql_fetch_assoc($rspatrocinadores_ptr)); ?>
            <div class="KT_bottombuttons">
              <div>
                <?php 
      // Show IF Conditional region1
      if (@$_GET['ptr_id'] == "") {
      ?>
                  <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
                  <?php 
      // else Conditional region1
      } else { ?>
                  <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
                  <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
                  <?php }
      // endif Conditional region1
      ?>
<input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, '../includes/nxt/back.php')" />
              </div>
            </div>
          </form>
        </div>
        <br class="clearfixplain" />
      </div>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>