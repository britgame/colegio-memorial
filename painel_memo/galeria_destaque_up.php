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

$colname_up_destaque = "-1";
if (isset($_GET['gid'])) {
  $colname_up_destaque = $_GET['gid'];
}
mysql_select_db($database_memorial2014, $memorial2014);
$query_up_destaque = sprintf("SELECT g_id, g_destaque FROM galeria_g WHERE g_id = %s", GetSQLValueString($colname_up_destaque, "int"));
$up_destaque = mysql_query($query_up_destaque, $memorial2014) or die(mysql_error());
$row_up_destaque = mysql_fetch_assoc($up_destaque);
$totalRows_up_destaque = mysql_num_rows($up_destaque);

if(@$row_up_destaque['g_destaque'] == 0) {
	$valor = 1;
}else{
	$valor = 0;
}
if (isset($_GET["gid"])) {
  $updateSQL = sprintf("UPDATE galeria_g SET g_destaque=$valor WHERE g_id=%s", GetSQLValueString($colname_up_destaque, "int"));

  mysql_select_db($database_memorial2014, $memorial2014);
  $Result1 = mysql_query($updateSQL, $memorial2014) or die(mysql_error());

  $updateGoTo = "galeria_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  // header(sprintf("Location: %s", $updateGoTo));
  echo '<script>window.location="'.$updateGoTo,'";</script><noscript><meta http-equiv="refresh" content="0; url='.$updateGoTo.'" /></noscript>';
}

mysql_free_result($up_destaque);
?>



