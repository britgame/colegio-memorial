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

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$espid = "-1";
if (isset($_GET['espid'])) {
  $espid = $_GET['espid'];
}
mysql_select_db($database_memorial2014, $memorial2014);
$query_verificar = "SELECT if_img_capa FROM instalacoes_fotos_if WHERE if_i_id = $espid and if_img_capa = 1";
$verificar = mysql_query($query_verificar, $memorial2014) or die(mysql_error());
$row_verificar = mysql_fetch_assoc($verificar);
$totalRows_verificar = mysql_num_rows($verificar);

if(isset($row_verificar['if_img_capa'])) {
// Make an update transaction instance
$upd_instalacoes_fotos_if1 = new tNG_update($conn_memorial2014);
$tNGs->addTransaction($upd_instalacoes_fotos_if1);
// Register triggers
$upd_instalacoes_fotos_if1->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "up");
// Add columns
$upd_instalacoes_fotos_if1->setTable("instalacoes_fotos_if");
$upd_instalacoes_fotos_if1->addColumn("if_img_capa", "NUMERIC_TYPE", "VALUE", "0");
$upd_instalacoes_fotos_if1->setPrimaryKey("if_i_id", "NUMERIC_TYPE", "GET", "espid");

// Make an update transaction instance
$upd_instalacoes_fotos_if = new tNG_update($conn_memorial2014);
$tNGs->addTransaction($upd_instalacoes_fotos_if);
// Register triggers
$upd_instalacoes_fotos_if->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "ifid");
$upd_instalacoes_fotos_if->registerTrigger("END", "Trigger_Default_Redirect", 99, "inst_fotos_lista.php?espid={GET.espid}");
// Add columns
$upd_instalacoes_fotos_if->setTable("instalacoes_fotos_if");
$upd_instalacoes_fotos_if->addColumn("if_img_capa", "NUMERIC_TYPE", "GET", "up");
$upd_instalacoes_fotos_if->setPrimaryKey("if_id", "NUMERIC_TYPE", "GET", "ifid");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsinstalacoes_fotos_if = $tNGs->getRecordset("instalacoes_fotos_if");
$row_rsinstalacoes_fotos_if = mysql_fetch_assoc($rsinstalacoes_fotos_if);
$totalRows_rsinstalacoes_fotos_if = mysql_num_rows($rsinstalacoes_fotos_if);

} else {
	
// Make an update transaction instance
$upd_instalacoes_fotos_if = new tNG_update($conn_memorial2014);
$tNGs->addTransaction($upd_instalacoes_fotos_if);
// Register triggers
$upd_instalacoes_fotos_if->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "GET", "ifid");
$upd_instalacoes_fotos_if->registerTrigger("END", "Trigger_Default_Redirect", 99, "inst_fotos_lista.php?espid={GET.espid}");
// Add columns
$upd_instalacoes_fotos_if->setTable("instalacoes_fotos_if");
$upd_instalacoes_fotos_if->addColumn("if_img_capa", "NUMERIC_TYPE", "GET", "up");
$upd_instalacoes_fotos_if->setPrimaryKey("if_id", "NUMERIC_TYPE", "GET", "ifid");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rsinstalacoes_fotos_if = $tNGs->getRecordset("instalacoes_fotos_if");
$row_rsinstalacoes_fotos_if = mysql_fetch_assoc($rsinstalacoes_fotos_if);
$totalRows_rsinstalacoes_fotos_if = mysql_num_rows($rsinstalacoes_fotos_if);
}
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
</head>

<body>
<p>
  <?php
	echo $tNGs->getErrorMsg();
?>
</p>
<p><?php echo $row_verificar['if_img_capa']; ?></p>
</body>
</html>
<?php
mysql_free_result($verificar);
?>
