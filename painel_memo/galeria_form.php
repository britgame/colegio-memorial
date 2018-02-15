<?php require_once('../Connections/memorial2014.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Require the MXI classes
require_once ('../includes/mxi/MXI.php');

// Load the KT_back class
require_once('../includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_memorial2014 = new KT_connection($memorial2014, $database_memorial2014);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("g_descricao", true, "text", "", "", "", "");
$formValidation->addField("g_imagem", true, "", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_DeleteFolder trigger
//remove this line if you want to edit the code by hand 
function Trigger_DeleteFolder(&$tNG) {
  $deleteObj = new tNG_DeleteFolder($tNG);
  $deleteObj->setBaseFolder("../images/galeria/");
  $deleteObj->setFolder("{g_id}");
  return $deleteObj->Execute();
}
//end Trigger_DeleteFolder trigger

// Start Multiple Image Upload Object
$multipleImageUpload = new tNG_MImageUpload("../", "KT_Upload2", "memorial2014");
$multipleImageUpload->setPrimaryKey("g_id", "{rsgaleria_g.g_id}");
$multipleImageUpload->setBaseFolder("../images/galeria/");
$multipleImageUpload->setFolder("{g_id}");
$multipleImageUpload->setMaxSize(3500);
$multipleImageUpload->setMaxFiles(100);
$multipleImageUpload->setAllowedExtensions("bmp, jpg, jpeg, gif, png");
$multipleImageUpload->setResize(700, 650, true);
// End Multiple Image Upload Object

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../images/galeria/");
  $deleteObj->setDbFieldName("g_imagem");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("g_imagem");
  $uploadObj->setDbFieldName("g_imagem");
  $uploadObj->setFolder("../images/galeria/");
  $uploadObj->setResize("true", 180, 120);
  $uploadObj->setMaxSize(1500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("custom");
  $uploadObj->setRenameRule("{g_id}.{KT_ext}");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_galeria_g = new tNG_multipleInsert($conn_memorial2014);
$tNGs->addTransaction($ins_galeria_g);
// Register triggers
$ins_galeria_g->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_galeria_g->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_galeria_g->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_galeria_g->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$ins_galeria_g->registerTrigger("AFTER", "Trigger_MultipleUploadRename", 90, $multipleImageUpload);
// Add columns
$ins_galeria_g->setTable("galeria_g");
$ins_galeria_g->addColumn("g_descricao", "STRING_TYPE", "POST", "g_descricao");
$ins_galeria_g->addColumn("g_imagem", "FILE_TYPE", "FILES", "g_imagem");
$ins_galeria_g->addColumn("g_destaque", "CHECKBOX_1_0_TYPE", "POST", "g_destaque", "0");
$ins_galeria_g->addColumn("g_data", "DATE_TYPE", "POST", "g_data");
$ins_galeria_g->setPrimaryKey("g_id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_galeria_g = new tNG_multipleUpdate($conn_memorial2014);
$tNGs->addTransaction($upd_galeria_g);
// Register triggers
$upd_galeria_g->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_galeria_g->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_galeria_g->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_galeria_g->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
$upd_galeria_g->registerTrigger("AFTER", "Trigger_MultipleUploadRename", 90, $multipleImageUpload);
// Add columns
$upd_galeria_g->setTable("galeria_g");
$upd_galeria_g->addColumn("g_descricao", "STRING_TYPE", "POST", "g_descricao");
$upd_galeria_g->addColumn("g_imagem", "FILE_TYPE", "FILES", "g_imagem");
$upd_galeria_g->addColumn("g_destaque", "CHECKBOX_1_0_TYPE", "POST", "g_destaque");
$upd_galeria_g->addColumn("g_data", "DATE_TYPE", "POST", "g_data");
$upd_galeria_g->setPrimaryKey("g_id", "NUMERIC_TYPE", "GET", "g_id");

// Make an instance of the transaction object
$del_galeria_g = new tNG_multipleDelete($conn_memorial2014);
$tNGs->addTransaction($del_galeria_g);
// Register triggers
$del_galeria_g->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_galeria_g->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_galeria_g->registerTrigger("AFTER", "Trigger_FileDelete", 98);
$del_galeria_g->registerTrigger("AFTER", "Trigger_DeleteFolder", 99);
// Add columns
$del_galeria_g->setTable("galeria_g");
$del_galeria_g->setPrimaryKey("g_id", "NUMERIC_TYPE", "GET", "g_id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsgaleria_g = $tNGs->getRecordset("galeria_g");
$row_rsgaleria_g = mysql_fetch_assoc($rsgaleria_g);
$totalRows_rsgaleria_g = mysql_num_rows($rsgaleria_g);
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
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>
<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['g_id'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Galeria</h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsgaleria_g > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
<tr>
            <td class="KT_th"><label for="g_descricao_<?php echo $cnt1; ?>">descrição:</label></td>
            <td><input type="text" name="g_descricao_<?php echo $cnt1; ?>" id="g_descricao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsgaleria_g['g_descricao']); ?>" size="32" maxlength="100" />
              <?php echo $tNGs->displayFieldHint("g_descricao");?> <?php echo $tNGs->displayFieldError("galeria_g", "g_descricao", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="g_imagem_<?php echo $cnt1; ?>">imagem CAPA:</label></td>
            <td><input type="file" name="g_imagem_<?php echo $cnt1; ?>" id="g_imagem_<?php echo $cnt1; ?>" size="32" />
              <?php echo $tNGs->displayFieldError("galeria_g", "g_imagem", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th">galeria</td>
            <td><a target="_blank" onclick="<?php echo $multipleImageUpload->getUploadAction(); ?>" href="<?php echo $multipleImageUpload->getUploadLink(); ?>"><strong>&gt;&gt; ADICIONAR FOTOS</strong></a>
              <input type="hidden" name="<?php echo $multipleImageUpload->getUploadReference(); ?>" value="1" /></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="g_destaque_<?php echo $cnt1; ?>">destaque:</label></td>
            <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rsgaleria_g['g_destaque']),"1"))) {echo "checked";} ?> type="checkbox" name="g_destaque_<?php echo $cnt1; ?>" id="g_destaque_<?php echo $cnt1; ?>" value="1" />
              <?php echo $tNGs->displayFieldError("galeria_g", "g_destaque", $cnt1); ?></td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_galeria_g_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsgaleria_g['kt_pk_galeria_g']); ?>" />
        <input type="hidden" name="g_data_<?php echo $cnt1; ?>" id="g_data_<?php echo $cnt1; ?>" value="<?php echo date ('d/m/yy'); ?>" />
        <?php } while ($row_rsgaleria_g = mysql_fetch_assoc($rsgaleria_g)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['g_id'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'g_id')" />
            </div>
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
<p>&nbsp;</p>
</body>
</html>