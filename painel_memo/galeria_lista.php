<?php require_once('../Connections/memorial2014.php'); ?>
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
$tfi_listgaleria_g2 = new TFI_TableFilter($conn_memorial2014, "tfi_listgaleria_g2");
$tfi_listgaleria_g2->addColumn("galeria_g.g_imagem", "STRING_TYPE", "g_imagem", "%");
$tfi_listgaleria_g2->addColumn("galeria_g.g_descricao", "STRING_TYPE", "g_descricao", "%");
$tfi_listgaleria_g2->addColumn("galeria_g.g_destaque", "NUMERIC_TYPE", "g_destaque", "=");
$tfi_listgaleria_g2->addColumn("galeria_g.g_data", "DATE_TYPE", "g_data", "=");
$tfi_listgaleria_g2->Execute();

// Sorter
$tso_listgaleria_g2 = new TSO_TableSorter("rsgaleria_g1", "tso_listgaleria_g2");
$tso_listgaleria_g2->addColumn("galeria_g.g_imagem");
$tso_listgaleria_g2->addColumn("galeria_g.g_descricao");
$tso_listgaleria_g2->addColumn("galeria_g.g_destaque");
$tso_listgaleria_g2->addColumn("galeria_g.g_data");
$tso_listgaleria_g2->setDefault("galeria_g.g_descricao");
$tso_listgaleria_g2->Execute();

// Navigation
$nav_listgaleria_g2 = new NAV_Regular("nav_listgaleria_g2", "rsgaleria_g1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsgaleria_g1 = $_SESSION['max_rows_nav_listgaleria_g2'];
$pageNum_rsgaleria_g1 = 0;
if (isset($_GET['pageNum_rsgaleria_g1'])) {
  $pageNum_rsgaleria_g1 = $_GET['pageNum_rsgaleria_g1'];
}
$startRow_rsgaleria_g1 = $pageNum_rsgaleria_g1 * $maxRows_rsgaleria_g1;

// Defining List Recordset variable
$NXTFilter_rsgaleria_g1 = "1=1";
if (isset($_SESSION['filter_tfi_listgaleria_g2'])) {
  $NXTFilter_rsgaleria_g1 = $_SESSION['filter_tfi_listgaleria_g2'];
}
// Defining List Recordset variable
$NXTSort_rsgaleria_g1 = "galeria_g.g_descricao";
if (isset($_SESSION['sorter_tso_listgaleria_g2'])) {
  $NXTSort_rsgaleria_g1 = $_SESSION['sorter_tso_listgaleria_g2'];
}
mysql_select_db($database_memorial2014, $memorial2014);

$query_rsgaleria_g1 = "SELECT galeria_g.g_ctg_id, galeria_g.g_imagem, galeria_g.g_descricao, galeria_g.g_destaque, galeria_g.g_data, galeria_g.g_id FROM galeria_g WHERE {$NXTFilter_rsgaleria_g1} ORDER BY {$NXTSort_rsgaleria_g1}";
$query_limit_rsgaleria_g1 = sprintf("%s LIMIT %d, %d", $query_rsgaleria_g1, $startRow_rsgaleria_g1, $maxRows_rsgaleria_g1);
$rsgaleria_g1 = mysql_query($query_limit_rsgaleria_g1, $memorial2014) or die(mysql_error());
$row_rsgaleria_g1 = mysql_fetch_assoc($rsgaleria_g1);

if (isset($_GET['totalRows_rsgaleria_g1'])) {
  $totalRows_rsgaleria_g1 = $_GET['totalRows_rsgaleria_g1'];
} else {
  $all_rsgaleria_g1 = mysql_query($query_rsgaleria_g1);
  $totalRows_rsgaleria_g1 = mysql_num_rows($all_rsgaleria_g1);
}
$totalPages_rsgaleria_g1 = ceil($totalRows_rsgaleria_g1/$maxRows_rsgaleria_g1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listgaleria_g2->checkBoundries();
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
  .KT_col_g_imagem {width:140px; overflow:hidden;}
  .KT_col_g_descricao {width:140px; overflow:hidden;}
  .KT_col_g_destaque {width:140px; overflow:hidden;}
  .KT_col_g_data {width:140px; overflow:hidden;}
</style>
</head>

<body>
<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>

<div class="KT_tng" id="listgaleria_g2">
  <h1> Galerias
    <?php
  $nav_listgaleria_g2->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listgaleria_g2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listgaleria_g2'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listgaleria_g2']; ?>
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
  if (@$_SESSION['has_filter_tfi_listgaleria_g2'] == 1) {
?>
          <a href="<?php echo $tfi_listgaleria_g2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
          <?php 
  // else Conditional region2
  } else { ?>
          <a href="<?php echo $tfi_listgaleria_g2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
          <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="g_imagem" class="KT_sorter KT_col_g_imagem <?php echo $tso_listgaleria_g2->getSortIcon('galeria_g.g_imagem'); ?>"> <a href="<?php echo $tso_listgaleria_g2->getSortLink('galeria_g.g_imagem'); ?>">imagem</a></th>
            <th id="g_descricao" class="KT_sorter KT_col_g_descricao <?php echo $tso_listgaleria_g2->getSortIcon('galeria_g.g_descricao'); ?>"> <a href="<?php echo $tso_listgaleria_g2->getSortLink('galeria_g.g_descricao'); ?>">descrição</a></th>
            <th id="g_destaque" class="KT_sorter KT_col_g_destaque <?php echo $tso_listgaleria_g2->getSortIcon('galeria_g.g_destaque'); ?>"> <a href="<?php echo $tso_listgaleria_g2->getSortLink('galeria_g.g_destaque'); ?>">destaque</a></th>
            <th id="g_data" class="KT_sorter KT_col_g_data <?php echo $tso_listgaleria_g2->getSortIcon('galeria_g.g_data'); ?>"> <a href="<?php echo $tso_listgaleria_g2->getSortLink('galeria_g.g_data'); ?>">data</a></th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listgaleria_g2'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listgaleria_g2_g_descricao" id="tfi_listgaleria_g2_g_descricao" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgaleria_g2_g_descricao']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listgaleria_g2_g_destaque" id="tfi_listgaleria_g2_g_destaque" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listgaleria_g2_g_destaque']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listgaleria_g2_g_data" id="tfi_listgaleria_g2_g_data" value="<?php echo @$_SESSION['tfi_listgaleria_g2_g_data']; ?>" size="10" maxlength="22" /></td>
              <td><input type="submit" name="tfi_listgaleria_g2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsgaleria_g1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="6"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsgaleria_g1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_galeria_g" class="id_checkbox" value="<?php echo $row_rsgaleria_g1['g_id']; ?>" />
                  <input type="hidden" name="g_id" class="id_field" value="<?php echo $row_rsgaleria_g1['g_id']; ?>" /></td>
                <td><div class="KT_col_g_imagem"><img src="../images/galeria/<?php echo $row_rsgaleria_g1['g_imagem']; ?>" width="100" height="75" /></div></td>
                <td><div class="KT_col_g_descricao"><?php echo KT_FormatForList($row_rsgaleria_g1['g_descricao'], 20); ?></div></td>
                <td><div class="KT_col_g_destaque"><?php if(@$row_rsgaleria_g1['g_destaque'] == 0) {?>
                    <a href="galeria_destaque_up.php?gid=<?php echo $row_rsgaleria_g1['g_id']; ?>"><img src="../images/checkbox_false.gif" width="21" height="21" border="0" /></a>
                    <?php } else { ?>
                    <a href="galeria_destaque_up.php?gid=<?php echo $row_rsgaleria_g1['g_id']; ?>"><img src="../images/checkbox_true.gif" width="22" height="22" border="0" /></a>
                <?php } ?></div></td>
                <td><div class="KT_col_g_data"><?php echo KT_formatDate($row_rsgaleria_g1['g_data']); ?></div></td>
                <td><a class="KT_edit_link" href="galeria_form.php?g_id=<?php echo $row_rsgaleria_g1['g_id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></td>
              </tr>
              <?php } while ($row_rsgaleria_g1 = mysql_fetch_assoc($rsgaleria_g1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listgaleria_g2->Prepare();
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
        <a class="KT_additem_op_link" href="galeria_form.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsgaleria_g1);
?>
