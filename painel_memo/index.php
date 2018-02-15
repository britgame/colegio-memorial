<?php require_once('../Connections/memorial2014.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Require the MXI classes
require_once ('../includes/mxi/MXI.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("../");

if(isset($_SESSION['kt_login_id'])) { header("Location: _menu.php"); }

// Make unified connection variable
$conn_memorial2014 = new KT_connection($memorial2014, $database_memorial2014);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("kt_login_user", true, "text", "", "", "", "");
$formValidation->addField("kt_login_password", true, "text", "", "", "", "");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make a login transaction instance
$loginTransaction = new tNG_login($conn_memorial2014);
$tNGs->addTransaction($loginTransaction);
// Register triggers
$loginTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "kt_login1");
$loginTransaction->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$loginTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "{kt_login_redirect}");
// Add columns
$loginTransaction->addColumn("kt_login_user", "STRING_TYPE", "POST", "kt_login_user");
$loginTransaction->addColumn("kt_login_password", "STRING_TYPE", "POST", "kt_login_password");
$loginTransaction->addColumn("kt_login_rememberme", "CHECKBOX_1_0_TYPE", "POST", "kt_login_rememberme", "0");
// End of login transaction instance

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscustom = $tNGs->getRecordset("custom");
$row_rscustom = mysql_fetch_assoc($rscustom);
$totalRows_rscustom = mysql_num_rows($rscustom);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel Administrativo Memorial</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="../includes/common/js/base.js" type="text/javascript"></script>
<script src="../includes/common/js/utility.js" type="text/javascript"></script>
<script src="../includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
</head>

<body>
<table width="900" border="0" cellpadding="3" cellspacing="0">
  <tr bgcolor="#FF9900">
    <td width="158" align="left" style="border-bottom:1px solid #666" ><img src="img/topo_logo.png" width="136" height="134" /></td>
    <td width="732" align="left" style="border-bottom:1px solid #666" ><br />
    <h1><strong>ADMINISTRAÇÃO Colégio Memorial</strong></h1></td>
  </tr>
</table>
<br />


<table width="900" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="center">
	<?php
	echo $tNGs->getLoginMsg();
?>
<?php
	echo $tNGs->getErrorMsg();
?>
<form method="post" id="form1" class="KT_tngformerror" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
    <tr>
      <td class="KT_th"><label for="kt_login_user">login:</label></td>
      <td><input type="text" name="kt_login_user" id="kt_login_user" value="<?php echo KT_escapeAttribute($row_rscustom['kt_login_user']); ?>" size="32" />
        <?php echo $tNGs->displayFieldHint("kt_login_user");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_user"); ?></td>
    </tr>
    <tr>
      <td class="KT_th"><label for="kt_login_password">senha:</label></td>
      <td><input type="password" name="kt_login_password" id="kt_login_password" value="" size="32" />
        <?php echo $tNGs->displayFieldHint("kt_login_password");?> <?php echo $tNGs->displayFieldError("custom", "kt_login_password"); ?></td>
    </tr>
    <tr>
      <td class="KT_th"><label for="kt_login_rememberme">lembrar-me?:</label></td>
      <td><input  <?php if (!(strcmp(KT_escapeAttribute($row_rscustom['kt_login_rememberme']),"1"))) {echo "checked";} ?> type="checkbox" name="kt_login_rememberme" id="kt_login_rememberme" value="1" />
        <?php echo $tNGs->displayFieldError("custom", "kt_login_rememberme"); ?></td>
    </tr>
    <tr class="KT_buttons">
      <td colspan="2"><input type="submit" name="kt_login1" id="kt_login1" value="Login" /></td>
    </tr>
  </table>
  <a href="forgot_password.php">Esqueceu sua senha?</a>
</form></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>