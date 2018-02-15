<?php require_once('../Connections/memorial2014.php'); ?>
<?php
// Require the MXI classes
require_once ('../includes/mxi/MXI.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Make unified connection variable
$conn_memorial2014 = new KT_connection($memorial2014, $database_memorial2014);

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_memorial2014, "../");
//Grand Levels: Any
$restrict->Execute();
//End Restrict Access To Page

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

mysql_select_db($database_memorial2014, $memorial2014);
$query_paginas = "SELECT p_id, p_titulo FROM paginas_p ORDER BY p_id ASC";
$paginas = mysql_query($query_paginas, $memorial2014) or die(mysql_error());
$row_paginas = mysql_fetch_assoc($paginas);
$totalRows_paginas = mysql_num_rows($paginas);

// Initialize the Alternate Color counter
$ac_sw1 = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>
<?php if(isset($_GET['up'])) { ?>
<table width="900" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td class="detail_cal" style="color:#C00; border:1px solid #F90; padding:10px"><strong>Pronto! Página atualizada com sucesso.</strong></td>
  </tr>
</table>
<?php } ?>
<table width="900" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
      <?php do { ?>
        <tr bgcolor="<?php echo ($ac_sw1++%2==0)?"#FFFFFF":"#FFFFCC"; ?>" onmouseout="this.style.backgroundColor=''" onmouseover="this.style.backgroundColor='#FF9900'">
          <td><ul>
            <li><a href="paginas_form.php?pid=<?php echo $row_paginas['p_id']; ?>" style="display:block; font-size:16px"><strong><?php echo $row_paginas['p_titulo']; ?></strong></a></li>
          </ul></td>
          <td>&nbsp;</td>
        </tr>
        <?php } while ($row_paginas = mysql_fetch_assoc($paginas)); ?>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($paginas);
?>
