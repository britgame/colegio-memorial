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

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_memorial2014, "../");
//Grand Levels: Any
$restrict->Execute();
//End Restrict Access To Page

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("i_titulo", true, "text", "", "", "", "");
$formValidation->addField("i_imagem", true, "", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../images/instalacoes/");
  $deleteObj->setDbFieldName("i_imagem");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("i_imagem");
  $uploadObj->setDbFieldName("i_imagem");
  $uploadObj->setFolder("../images/instalacoes/");
  $uploadObj->setResize("true", 200, 140);
  $uploadObj->setMaxSize(5500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("custom");
  $uploadObj->setRenameRule("{i_id}.{KT_ext}");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_intalacoes_i = new tNG_multipleInsert($conn_memorial2014);
$tNGs->addTransaction($ins_intalacoes_i);
// Register triggers
$ins_intalacoes_i->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_intalacoes_i->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_intalacoes_i->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_intalacoes_i->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_intalacoes_i->setTable("intalacoes_i");
$ins_intalacoes_i->addColumn("i_titulo", "STRING_TYPE", "POST", "i_titulo");
$ins_intalacoes_i->addColumn("i_imagem", "FILE_TYPE", "FILES", "i_imagem");
$ins_intalacoes_i->setPrimaryKey("i_id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_intalacoes_i = new tNG_multipleUpdate($conn_memorial2014);
$tNGs->addTransaction($upd_intalacoes_i);
// Register triggers
$upd_intalacoes_i->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_intalacoes_i->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_intalacoes_i->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_intalacoes_i->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_intalacoes_i->setTable("intalacoes_i");
$upd_intalacoes_i->addColumn("i_titulo", "STRING_TYPE", "POST", "i_titulo");
$upd_intalacoes_i->addColumn("i_imagem", "FILE_TYPE", "FILES", "i_imagem");
$upd_intalacoes_i->setPrimaryKey("i_id", "NUMERIC_TYPE", "GET", "i_id");

// Make an instance of the transaction object
$del_intalacoes_i = new tNG_multipleDelete($conn_memorial2014);
$tNGs->addTransaction($del_intalacoes_i);
// Register triggers
$del_intalacoes_i->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_intalacoes_i->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_intalacoes_i->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_intalacoes_i->setTable("intalacoes_i");
$del_intalacoes_i->setPrimaryKey("i_id", "NUMERIC_TYPE", "GET", "i_id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsintalacoes_i = $tNGs->getRecordset("intalacoes_i");
$row_rsintalacoes_i = mysql_fetch_assoc($rsintalacoes_i);
$totalRows_rsintalacoes_i = mysql_num_rows($rsintalacoes_i);
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
if (@$_GET['i_id'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Intalacões  </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsintalacoes_i > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="i_titulo_<?php echo $cnt1; ?>">titulo:</label></td>
            <td><input type="text" name="i_titulo_<?php echo $cnt1; ?>" id="i_titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsintalacoes_i['i_titulo']); ?>" size="32" maxlength="100" />
              <?php echo $tNGs->displayFieldHint("i_titulo");?> <?php echo $tNGs->displayFieldError("intalacoes_i", "i_titulo", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="i_imagem_<?php echo $cnt1; ?>">imagem capa:</label></td>
            <td><input type="file" name="i_imagem_<?php echo $cnt1; ?>" id="i_imagem_<?php echo $cnt1; ?>" size="32" />
              <?php echo $tNGs->displayFieldError("intalacoes_i", "i_imagem", $cnt1); ?></td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_intalacoes_i_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsintalacoes_i['kt_pk_intalacoes_i']); ?>" />
        <?php } while ($row_rsintalacoes_i = mysql_fetch_assoc($rsintalacoes_i)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['i_id'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'i_id')" />
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