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
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_FileDelete trigger
//remove this line if you want to edit the code by hand 
function Trigger_FileDelete(&$tNG) {
  $deleteObj = new tNG_FileDelete($tNG);
  $deleteObj->setFolder("../images/instalacoes/{if_i_id}/");
  $deleteObj->setDbFieldName("if_imagem");
  return $deleteObj->Execute();
}
//end Trigger_FileDelete trigger

//start Trigger_ImageUpload trigger
//remove this line if you want to edit the code by hand 
function Trigger_ImageUpload(&$tNG) {
  $uploadObj = new tNG_ImageUpload($tNG);
  $uploadObj->setFormFieldName("if_imagem");
  $uploadObj->setDbFieldName("if_imagem");
  $uploadObj->setFolder("../images/instalacoes/{GET.instid}/");
  $uploadObj->setResize("true", 700, 450);
  $uploadObj->setMaxSize(5500);
  $uploadObj->setAllowedExtensions("gif, jpg, jpe, jpeg, png");
  $uploadObj->setRename("custom");
  $uploadObj->setRenameRule("{if_id}.{KT_ext}");
  return $uploadObj->Execute();
}
//end Trigger_ImageUpload trigger

// Make an insert transaction instance
$ins_instalacoes_fotos_if = new tNG_multipleInsert($conn_memorial2014);
$tNGs->addTransaction($ins_instalacoes_fotos_if);
// Register triggers
$ins_instalacoes_fotos_if->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$ins_instalacoes_fotos_if->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$ins_instalacoes_fotos_if->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$ins_instalacoes_fotos_if->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$ins_instalacoes_fotos_if->setTable("instalacoes_fotos_if");
$ins_instalacoes_fotos_if->addColumn("if_titulo", "STRING_TYPE", "POST", "if_titulo");
$ins_instalacoes_fotos_if->addColumn("if_texto", "STRING_TYPE", "POST", "if_texto");
$ins_instalacoes_fotos_if->addColumn("if_imagem", "FILE_TYPE", "FILES", "if_imagem");
$ins_instalacoes_fotos_if->addColumn("if_i_id", "NUMERIC_TYPE", "POST", "if_i_id");
$ins_instalacoes_fotos_if->setPrimaryKey("if_id", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_instalacoes_fotos_if = new tNG_multipleUpdate($conn_memorial2014);
$tNGs->addTransaction($upd_instalacoes_fotos_if);
// Register triggers
$upd_instalacoes_fotos_if->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_instalacoes_fotos_if->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_instalacoes_fotos_if->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$upd_instalacoes_fotos_if->registerTrigger("AFTER", "Trigger_ImageUpload", 97);
// Add columns
$upd_instalacoes_fotos_if->setTable("instalacoes_fotos_if");
$upd_instalacoes_fotos_if->addColumn("if_titulo", "STRING_TYPE", "POST", "if_titulo");
$upd_instalacoes_fotos_if->addColumn("if_texto", "STRING_TYPE", "POST", "if_texto");
$upd_instalacoes_fotos_if->addColumn("if_imagem", "FILE_TYPE", "FILES", "if_imagem");
$upd_instalacoes_fotos_if->addColumn("if_i_id", "NUMERIC_TYPE", "POST", "if_i_id");
$upd_instalacoes_fotos_if->setPrimaryKey("if_id", "NUMERIC_TYPE", "GET", "if_id");

// Make an instance of the transaction object
$del_instalacoes_fotos_if = new tNG_multipleDelete($conn_memorial2014);
$tNGs->addTransaction($del_instalacoes_fotos_if);
// Register triggers
$del_instalacoes_fotos_if->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_instalacoes_fotos_if->registerTrigger("END", "Trigger_Default_Redirect", 99, "../includes/nxt/back.php");
$del_instalacoes_fotos_if->registerTrigger("AFTER", "Trigger_FileDelete", 98);
// Add columns
$del_instalacoes_fotos_if->setTable("instalacoes_fotos_if");
$del_instalacoes_fotos_if->setPrimaryKey("if_id", "NUMERIC_TYPE", "GET", "if_id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsinstalacoes_fotos_if = $tNGs->getRecordset("instalacoes_fotos_if");
$row_rsinstalacoes_fotos_if = mysql_fetch_assoc($rsinstalacoes_fotos_if);
$totalRows_rsinstalacoes_fotos_if = mysql_num_rows($rsinstalacoes_fotos_if);
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
if (@$_GET['if_id'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
      Foto
  </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" enctype="multipart/form-data">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rsinstalacoes_fotos_if > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="if_titulo_<?php echo $cnt1; ?>">titulo:</label></td>
            <td><input type="text" name="if_titulo_<?php echo $cnt1; ?>" id="if_titulo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rsinstalacoes_fotos_if['if_titulo']); ?>" size="32" maxlength="100" />
              <?php echo $tNGs->displayFieldHint("if_titulo");?> <?php echo $tNGs->displayFieldError("instalacoes_fotos_if", "if_titulo", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="if_texto_<?php echo $cnt1; ?>">texto:</label></td>
            <td><textarea name="if_texto_<?php echo $cnt1; ?>" id="if_texto_<?php echo $cnt1; ?>" cols="50" rows="5"><?php echo KT_escapeAttribute($row_rsinstalacoes_fotos_if['if_texto']); ?></textarea>
              <?php echo $tNGs->displayFieldHint("if_texto");?> <?php echo $tNGs->displayFieldError("instalacoes_fotos_if", "if_texto", $cnt1); ?></td>
          </tr>
          <tr>
            <td class="KT_th"><label for="if_imagem_<?php echo $cnt1; ?>">imagem:</label></td>
            <td><input type="file" name="if_imagem_<?php echo $cnt1; ?>" id="if_imagem_<?php echo $cnt1; ?>" size="32" />
              <?php echo $tNGs->displayFieldError("instalacoes_fotos_if", "if_imagem", $cnt1); ?>
              <input type="hidden" name="if_i_id_<?php echo $cnt1; ?>" id="if_i_id_<?php echo $cnt1; ?>" value="<?php echo $_GET['instid']; ?>" /></td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_instalacoes_fotos_if_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rsinstalacoes_fotos_if['kt_pk_instalacoes_fotos_if']); ?>" />
        <?php } while ($row_rsinstalacoes_fotos_if = mysql_fetch_assoc($rsinstalacoes_fotos_if)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['if_id'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'if_id')" />
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
</div>
</body>
</html>