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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>
<?php if(isset($_GET['upsenha'])) { ?>
<table width="900" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td class="detail_cal" style="color:#C00; border:1px solid #F90; padding:10px"><strong>Pronto! Sua senha foi redefinida com sucesso.</strong></td>
  </tr>
</table>
<?php } ?>

</body>
</html>