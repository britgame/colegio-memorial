﻿<?php require_once('../Connections/memorial2014.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Require the MXI classes
require_once ('../includes/mxi/MXI.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

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

// Filter
$tfi_listintalacoes_i1 = new TFI_TableFilter($conn_memorial2014, "tfi_listintalacoes_i1");
$tfi_listintalacoes_i1->addColumn("intalacoes_i.i_imagem", "STRING_TYPE", "i_imagem", "%");
$tfi_listintalacoes_i1->addColumn("intalacoes_i.i_titulo", "STRING_TYPE", "i_titulo", "%");
$tfi_listintalacoes_i1->Execute();

// Sorter
$tso_listintalacoes_i1 = new TSO_TableSorter("rsintalacoes_i1", "tso_listintalacoes_i1");
$tso_listintalacoes_i1->addColumn("intalacoes_i.i_imagem");
$tso_listintalacoes_i1->addColumn("intalacoes_i.i_titulo");
$tso_listintalacoes_i1->setDefault("intalacoes_i.i_titulo");
$tso_listintalacoes_i1->Execute();

// Navigation
$nav_listintalacoes_i1 = new NAV_Regular("nav_listintalacoes_i1", "rsintalacoes_i1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsintalacoes_i1 = $_SESSION['max_rows_nav_listintalacoes_i1'];
$pageNum_rsintalacoes_i1 = 0;
if (isset($_GET['pageNum_rsintalacoes_i1'])) {
  $pageNum_rsintalacoes_i1 = $_GET['pageNum_rsintalacoes_i1'];
}
$startRow_rsintalacoes_i1 = $pageNum_rsintalacoes_i1 * $maxRows_rsintalacoes_i1;

// Defining List Recordset variable
$NXTFilter_rsintalacoes_i1 = "1=1";
if (isset($_SESSION['filter_tfi_listintalacoes_i1'])) {
  $NXTFilter_rsintalacoes_i1 = $_SESSION['filter_tfi_listintalacoes_i1'];
}
// Defining List Recordset variable
$NXTSort_rsintalacoes_i1 = "intalacoes_i.i_titulo";
if (isset($_SESSION['sorter_tso_listintalacoes_i1'])) {
  $NXTSort_rsintalacoes_i1 = $_SESSION['sorter_tso_listintalacoes_i1'];
}
mysql_select_db($database_memorial2014, $memorial2014);

$query_rsintalacoes_i1 = "SELECT intalacoes_i.i_titulo, intalacoes_i.i_imagem, intalacoes_i.i_id FROM intalacoes_i WHERE {$NXTFilter_rsintalacoes_i1} ORDER BY {$NXTSort_rsintalacoes_i1}";
$query_limit_rsintalacoes_i1 = sprintf("%s LIMIT %d, %d", $query_rsintalacoes_i1, $startRow_rsintalacoes_i1, $maxRows_rsintalacoes_i1);
$rsintalacoes_i1 = mysql_query($query_limit_rsintalacoes_i1, $memorial2014) or die(mysql_error());
$row_rsintalacoes_i1 = mysql_fetch_assoc($rsintalacoes_i1);

if (isset($_GET['totalRows_rsintalacoes_i1'])) {
  $totalRows_rsintalacoes_i1 = $_GET['totalRows_rsintalacoes_i1'];
} else {
  $all_rsintalacoes_i1 = mysql_query($query_rsintalacoes_i1);
  $totalRows_rsintalacoes_i1 = mysql_num_rows($all_rsintalacoes_i1);
}
$totalPages_rsintalacoes_i1 = ceil($totalRows_rsintalacoes_i1/$maxRows_rsintalacoes_i1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listintalacoes_i1->checkBoundries();
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
<script src="../includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="../includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: false
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_i_titulo {width:140px; overflow:hidden;}
  .KT_col_i_imagem {width:140px; overflow:hidden;}
</style>
</head>

<body>
 
 
<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>
<p>&nbsp;</p>
<div class="KT_tng" id="listintalacoes_i1">
  <h1> Intalacoes
    <?php
  $nav_listintalacoes_i1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listintalacoes_i1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listintalacoes_i1'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listintalacoes_i1']; ?>
          <?php 
  // else Conditional region1
  } else { ?>
          <?php echo NXT_getResource("all"); ?>
          <?php } 
  // endif Conditional region1
?>
        <?php echo NXT_getResource("records"); ?></a> &nbsp;
        &nbsp;
        <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listintalacoes_i1'] == 1) {
?>
          <a href="<?php echo $tfi_listintalacoes_i1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
          <?php 
  // else Conditional region2
  } else { ?>
          <a href="<?php echo $tfi_listintalacoes_i1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
          <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="i_imagem" class="KT_sorter KT_col_i_imagem <?php echo $tso_listintalacoes_i1->getSortIcon('intalacoes_i.i_imagem'); ?>"> <a href="<?php echo $tso_listintalacoes_i1->getSortLink('intalacoes_i.i_imagem'); ?>">imagem capa</a></th>
            <th id="i_titulo" class="KT_sorter KT_col_i_titulo <?php echo $tso_listintalacoes_i1->getSortIcon('intalacoes_i.i_titulo'); ?>"> <a href="<?php echo $tso_listintalacoes_i1->getSortLink('intalacoes_i.i_titulo'); ?>">titulo</a></th>
<th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listintalacoes_i1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listintalacoes_i1_i_imagem" id="tfi_listintalacoes_i1_i_imagem" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listintalacoes_i1_i_imagem']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listintalacoes_i1_i_titulo" id="tfi_listintalacoes_i1_i_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listintalacoes_i1_i_titulo']); ?>" size="20" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listintalacoes_i1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsintalacoes_i1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="4"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsintalacoes_i1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_intalacoes_i" class="id_checkbox" value="<?php echo $row_rsintalacoes_i1['i_id']; ?>" />
                  <input type="hidden" name="i_id" class="id_field" value="<?php echo $row_rsintalacoes_i1['i_id']; ?>" /></td>
                <td><div class="KT_col_i_imagem"><img src="../images/instalacoes/<?php echo $row_rsintalacoes_i1['i_imagem']; ?>" width="100" height="75" /></div></td>
                <td><div class="KT_col_i_titulo"><?php echo KT_FormatForList($row_rsintalacoes_i1['i_titulo'], 20); ?></div></td>
                <td><p><a class="KT_edit_link" href="inst_form.php?i_id=<?php echo $row_rsintalacoes_i1['i_id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></p>
                    <br />
                    <a href="inst_fotos_form.php?instid=<?php echo $row_rsintalacoes_i1['i_id']; ?>"><strong>&gt;&gt;EDITAR GALERIA</strong></a></td>
              </tr>
              <?php } while ($row_rsintalacoes_i1 = mysql_fetch_assoc($rsintalacoes_i1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listintalacoes_i1->Prepare();
            require("../includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a></div>
        <span>&nbsp;</span>
        <select name="no_new" id="no_new">
          <option value="1">1</option>
          <option value="3">3</option>
          <option value="6">6</option>
        </select>
        <a class="KT_additem_op_link" href="inst_form.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsintalacoes_i1);
?>
