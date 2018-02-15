<?php require_once('../Connections/memorial2014.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

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
  $myThrowError->setErrorMsg("Passwords do not match.");
  $myThrowError->setField("u_senha");
  $myThrowError->setFieldErrorMsg("The two passwords do not match.");
  return $myThrowError->Execute();
}
//end Trigger_CheckPasswords trigger

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("u_login", true, "text", "", "", "", "");
$formValidation->addField("u_senha", true, "text", "", "", "", "");
$formValidation->addField("u_email", true, "text", "email", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
$userRegistration = new tNG_insert($conn_memorial2014);
$tNGs->addTransaction($userRegistration);
// Register triggers
$userRegistration->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
$userRegistration->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$userRegistration->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
$userRegistration->registerConditionalTrigger("{POST.u_senha} != {POST.re_u_senha}", "BEFORE", "Trigger_CheckPasswords", 50);
// Add columns
$userRegistration->setTable("usuario_u");
$userRegistration->addColumn("u_login", "STRING_TYPE", "POST", "u_login");
$userRegistration->addColumn("u_senha", "STRING_TYPE", "POST", "u_senha");
$userRegistration->addColumn("u_email", "STRING_TYPE", "POST", "u_email");
$userRegistration->addColumn("u_data", "DATE_TYPE", "POST", "u_data");
$userRegistration->setPrimaryKey("u_id", "NUMERIC_TYPE");

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
	echo $tNGs->getErrorMsg();
?>
<form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
    <tr>
      <td class="KT_th"><label for="u_login">login:</label></td>
      <td><input type="text" name="u_login" id="u_login" value="<?php echo KT_escapeAttribute($row_rsusuario_u['u_login']); ?>" size="32" />
        <?php echo $tNGs->displayFieldHint("u_login");?> <?php echo $tNGs->displayFieldError("usuario_u", "u_login"); ?></td>
    </tr>
    <tr>
      <td class="KT_th"><label for="u_senha">senha:</label></td>
      <td><input type="password" name="u_senha" id="u_senha" value="" size="32" />
        <?php echo $tNGs->displayFieldHint("u_senha");?> <?php echo $tNGs->displayFieldError("usuario_u", "u_senha"); ?></td>
    </tr>
    <tr>
      <td class="KT_th"><label for="re_u_senha">Re-type senha:</label></td>
      <td><input type="password" name="re_u_senha" id="re_u_senha" value="" size="32" /></td>
    </tr>
    <tr>
      <td class="KT_th"><label for="u_email">email:</label></td>
      <td><input type="text" name="u_email" id="u_email" value="<?php echo KT_escapeAttribute($row_rsusuario_u['u_email']); ?>" size="32" />
        <?php echo $tNGs->displayFieldHint("u_email");?> <?php echo $tNGs->displayFieldError("usuario_u", "u_email"); ?></td>
    </tr>
    <tr class="KT_buttons">
      <td colspan="2"><input type="submit" name="KT_Insert1" id="KT_Insert1" value="Register" /></td>
    </tr>
  </table>
  <input type="hidden" name="u_data" id="u_data" value="<?php echo date ('Y/m/d'); ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>