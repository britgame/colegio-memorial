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

// Make a logout transaction instance
$logoutTransaction = new tNG_logoutTransaction($conn_memorial2014);
$tNGs->addTransaction($logoutTransaction);
// Register triggers
$logoutTransaction->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "KT_logout_now");
$logoutTransaction->registerTrigger("END", "Trigger_Default_Redirect", 99, "../index.php");
// Add columns
// End of logout transaction instance

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
</head>

<body>
<table width="900" border="0" cellpadding="3" cellspacing="0">
  <tr bgcolor="#FF9900">
    <td align="left" style="border-bottom:1px solid #666" ><img src="img/topo_logo.png" width="136" height="134" /></td>
    <td align="left" style="border-bottom:1px solid #666" ><br />
    <h1><strong>ADMINISTRAÇÃO Colégio Memorial</strong></h1></td>
  </tr>
  <tr>
    <td width="158" align="center">&nbsp;</td>
    <td width="732" align="right"> Você está logado como &quot;<strong><?php echo $_SESSION['kt_login_user']; ?></strong>&quot; &nbsp;| &nbsp;
    <?php
	echo $tNGs->getErrorMsg();
?>
<a href="<?php echo $logoutTransaction->getLogoutLink(); ?>"><strong>SAIR</strong></a></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF" style="border-bottom:1px solid #666">Escolha o que deseja fazer abaixo:<br />
    <h1><a href="paginas_lista.php"><strong>Administrar PÁGINAS</strong></a> | <a href="instalacoes_lista.php"><strong>Administrar ESPAÇOS</strong></a> | <a href="patrocinadores_lista.php"><strong>Administrar PATROCINADORES</strong></a> |&nbsp;<a href="emails_lista.php"><strong>Administrar E-MAILs</strong></a> | <a href="login_senha.php"><strong>Redefinir SENHA</strong></a></h1></td>
  </tr>
</table>
</body>
</html>