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

$colname_paginas = "-1";
if (isset($_GET['pid'])) {
  $colname_paginas = $_GET['pid'];
}
mysql_select_db($database_memorial2014, $memorial2014);
$query_paginas = sprintf("SELECT p_titulo FROM paginas_p WHERE p_id = %s", GetSQLValueString($colname_paginas, "int"));
$paginas = mysql_query($query_paginas, $memorial2014) or die(mysql_error());
$row_paginas = mysql_fetch_assoc($paginas);
$totalRows_paginas = mysql_num_rows($paginas);

// Make an update transaction instance
$upd_paginas_p = new tNG_update($conn_memorial2014);
$tNGs->addTransaction($upd_paginas_p);
// Register triggers
$upd_paginas_p->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_paginas_p->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_paginas_p->registerTrigger("END", "Trigger_Default_Redirect", 99, "paginas_lista.php?up=ok");
//if(isset($_POST['KT_Update1'])) {
//	header("Location: paginas_lista.php?up=ok");
//}


// Add columns
$upd_paginas_p->setTable("paginas_p");
$upd_paginas_p->addColumn("p_texto", "STRING_TYPE", "POST", "p_texto");
$upd_paginas_p->addColumn("p_data", "DATE_TYPE", "POST", "p_data");
$upd_paginas_p->setPrimaryKey("p_id", "NUMERIC_TYPE", "GET", "pid");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rspaginas_p = $tNGs->getRecordset("paginas_p");
$row_rspaginas_p = mysql_fetch_assoc($rspaginas_p);
$totalRows_rspaginas_p = mysql_num_rows($rspaginas_p);
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
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php echo $tNGs->displayValidationRules();?>
</head>

<body>
<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>
<table width="900" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td bgcolor="#FFCC00"><span class="combo"><strong>Alterando página:</strong></span> <span class="con_tit_01"><?php echo $row_paginas['p_titulo']; ?></span></td>
  </tr>
  <tr>
    <td>&nbsp;
      <?php
	echo $tNGs->getErrorMsg();
?>
      <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><textarea name="p_texto" id="p_texto"><?php echo KT_escapeAttribute($row_rspaginas_p['p_texto']); ?></textarea>
  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                // CKEDITOR.replace( 'editor1' );
	//CKEDITOR.replace( 'up_alt',
	//{
	//	filebrowserImageBrowseUrl : 'kcfinder/browse.php?opener=ckeditor&type=images',
	//	filebrowserImageUploadUrl : 'kcfinder/upload.php?opener=ckeditor&type=images'
	//});
CKEDITOR.replace( 'p_texto' );
</script>
            <?php echo $tNGs->displayFieldHint("p_texto");?> <?php echo $tNGs->displayFieldError("paginas_p", "p_texto"); ?></td>
          </tr>
          <tr class="KT_buttons">
            <td><input type="submit" name="KT_Update1" id="KT_Update1" value="Atualizar registro" /></td>
          </tr>
        </table>
        <input type="hidden" name="p_data" id="p_data" value="<?php echo date ('d/m/yy'); ?>" />
      </form></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($paginas);
?>
