<?php require_once('Connections/memorial2014.php'); ?>
<?php
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

$colname_fundamental_e = "-1";
if (isset($_GET['eid'])) {
  $colname_fundamental_e = $_GET['eid'];
}
mysql_select_db($database_memorial2014, $memorial2014);
$query_fundamental_e = sprintf("SELECT * FROM emails_e WHERE e_id = %s", GetSQLValueString($colname_fundamental_e, "int"));
$fundamental_e = mysql_query($query_fundamental_e, $memorial2014) or die(mysql_error());
$row_fundamental_e = mysql_fetch_assoc($fundamental_e);
$totalRows_fundamental_e = mysql_num_rows($fundamental_e);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
html {
	height:100%
}
-->
</style>
</head>

<body>
<table width="650" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="100%">
    <p><?php echo $row_fundamental_e['e_texto']; ?></p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($fundamental_e);
?>
