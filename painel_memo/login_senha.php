<?php require_once('../Connections/memorial2014.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Require the MXI classes
require_once ('../includes/mxi/MXI.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

// Make unified connection variable
$conn_memorial2014 = new KT_connection($memorial2014, $database_memorial2014);

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_memorial2014, "../");
//Grand Levels: Any
$restrict->Execute();
//End Restrict Access To Page

//start Trigger_CheckPasswords trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckPasswords(&$tNG) {
  $myThrowError = new tNG_ThrowError($tNG);
  $myThrowError->setErrorMsg("Não foi possível redefinir sua senha.");
  $myThrowError->setField("u_senha");
  $myThrowError->setFieldErrorMsg("As novas senhas não coincidem.");
  return $myThrowError->Execute();
}
//end Trigger_CheckPasswords trigger

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("u_senha", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

//start Trigger_CheckOldPassword trigger
//remove this line if you want to edit the code by hand
function Trigger_CheckOldPassword(&$tNG) {
  return Trigger_UpdatePassword_CheckOldPassword($tNG);
}
//end Trigger_CheckOldPassword trigger

// Make an update transaction instance
$upd_usuario_u = new tNG_update($conn_memorial2014);
$tNGs->addTransaction($upd_usuario_u);
// Register triggers
$upd_usuario_u->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_usuario_u->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_usuario_u->registerTrigger("END", "Trigger_Default_Redirect", 99, "_menu.php?upsenha=ok");
$upd_usuario_u->registerConditionalTrigger("{POST.u_senha} != {POST.re_u_senha}", "BEFORE", "Trigger_CheckPasswords", 50);
$upd_usuario_u->registerTrigger("BEFORE", "Trigger_CheckOldPassword", 60);
// Add columns
$upd_usuario_u->setTable("usuario_u");
$upd_usuario_u->addColumn("u_senha", "STRING_TYPE", "POST", "u_senha");
$upd_usuario_u->setPrimaryKey("u_id", "NUMERIC_TYPE", "SESSION", "kt_login_id");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsusuario_u = $tNGs->getRecordset("usuario_u");
$row_rsusuario_u = mysql_fetch_assoc($rsusuario_u);
$totalRows_rsusuario_u = mysql_num_rows($rsusuario_u);
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
</head>

<body>
<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>
<p>&nbsp;
  <?php
	echo $tNGs->getErrorMsg();
?>
<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
    <tr>
      <td class="KT_th"><label for="old_u_senha">Senha Antiga:</label></td>
      <td><input type="password" name="old_u_senha" id="old_u_senha" value="" size="32" />
        <?php echo $tNGs->displayFieldError("usuario_u", "old_u_senha"); ?></td>
    </tr>
    <tr>
      <td class="KT_th"><label for="u_senha">Nova senha:</label></td>
      <td><input type="password" name="u_senha" id="u_senha" value="" size="32" />
        <?php echo $tNGs->displayFieldHint("u_senha");?> <?php echo $tNGs->displayFieldError("usuario_u", "u_senha"); ?></td>
    </tr>
    <tr>
      <td class="KT_th"><label for="re_u_senha">Repetir nova senha:</label></td>
      <td><input type="password" name="re_u_senha" id="re_u_senha" value="" size="32" /></td>
    </tr>
    <tr class="KT_buttons">
      <td colspan="2"><input type="submit" name="KT_Update1" id="KT_Update1" value="Atualizar registro" /></td>
    </tr>
  </table>
</form>
</body>
</html>