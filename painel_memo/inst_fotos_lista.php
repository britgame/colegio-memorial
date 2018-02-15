<?php require_once('../Connections/memorial2014.php'); ?>
<?php
// Load the common classes
require_once('../includes/common/KT_common.php');

// Require the MXI classes
require_once ('../includes/mxi/MXI.php');

// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Load the required classes
require_once('../includes/tfi/TFI.php');
require_once('../includes/tso/TSO.php');
require_once('../includes/nav/NAV.php');

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

// Filter
$tfi_listinstalacoes_fotos_if1 = new TFI_TableFilter($conn_memorial2014, "tfi_listinstalacoes_fotos_if1");
$tfi_listinstalacoes_fotos_if1->addColumn("instalacoes_fotos_if.if_imagem", "STRING_TYPE", "if_imagem", "%");
$tfi_listinstalacoes_fotos_if1->addColumn("instalacoes_fotos_if.if_titulo", "STRING_TYPE", "if_titulo", "%");
$tfi_listinstalacoes_fotos_if1->addColumn("if_img_capa", "STRING_TYPE", "if_img_capa", "%");
$tfi_listinstalacoes_fotos_if1->Execute();

// Sorter
$tso_listinstalacoes_fotos_if1 = new TSO_TableSorter("rsinstalacoes_fotos_if1", "tso_listinstalacoes_fotos_if1");
$tso_listinstalacoes_fotos_if1->addColumn("instalacoes_fotos_if.if_imagem");
$tso_listinstalacoes_fotos_if1->addColumn("instalacoes_fotos_if.if_titulo");
$tso_listinstalacoes_fotos_if1->addColumn("if_img_capa");
$tso_listinstalacoes_fotos_if1->setDefault("instalacoes_fotos_if.if_titulo");
$tso_listinstalacoes_fotos_if1->Execute();

// Navigation
$nav_listinstalacoes_fotos_if1 = new NAV_Regular("nav_listinstalacoes_fotos_if1", "rsinstalacoes_fotos_if1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rsinstalacoes_fotos_if1 = $_SESSION['max_rows_nav_listinstalacoes_fotos_if1'];
$pageNum_rsinstalacoes_fotos_if1 = 0;
if (isset($_GET['pageNum_rsinstalacoes_fotos_if1'])) {
  $pageNum_rsinstalacoes_fotos_if1 = $_GET['pageNum_rsinstalacoes_fotos_if1'];
}
$startRow_rsinstalacoes_fotos_if1 = $pageNum_rsinstalacoes_fotos_if1 * $maxRows_rsinstalacoes_fotos_if1;

$colname_rsinstalacoes_fotos_if1 = "-1";
if (isset($_GET['espid'])) {
  $colname_rsinstalacoes_fotos_if1 = $_GET['espid'];
}
// Defining List Recordset variable
$NXTFilter_rsinstalacoes_fotos_if1 = "1=1";
if (isset($_SESSION['filter_tfi_listinstalacoes_fotos_if1'])) {
  $NXTFilter_rsinstalacoes_fotos_if1 = $_SESSION['filter_tfi_listinstalacoes_fotos_if1'];
}
// Defining List Recordset variable
$NXTSort_rsinstalacoes_fotos_if1 = "instalacoes_fotos_if.if_titulo";
if (isset($_SESSION['sorter_tso_listinstalacoes_fotos_if1'])) {
  $NXTSort_rsinstalacoes_fotos_if1 = $_SESSION['sorter_tso_listinstalacoes_fotos_if1'];
}
mysql_select_db($database_memorial2014, $memorial2014);

$query_rsinstalacoes_fotos_if1 = sprintf("SELECT if_id, if_i_id, if_titulo, if_imagem, if_img_capa FROM instalacoes_fotos_if WHERE if_i_id = %s ORDER BY if_img_capa DESC", GetSQLValueString($colname_rsinstalacoes_fotos_if1, "int"));
$query_limit_rsinstalacoes_fotos_if1 = sprintf("%s LIMIT %d, %d", $query_rsinstalacoes_fotos_if1, $startRow_rsinstalacoes_fotos_if1, $maxRows_rsinstalacoes_fotos_if1);
$rsinstalacoes_fotos_if1 = mysql_query($query_limit_rsinstalacoes_fotos_if1, $memorial2014) or die(mysql_error());
$row_rsinstalacoes_fotos_if1 = mysql_fetch_assoc($rsinstalacoes_fotos_if1);

if (isset($_GET['totalRows_rsinstalacoes_fotos_if1'])) {
  $totalRows_rsinstalacoes_fotos_if1 = $_GET['totalRows_rsinstalacoes_fotos_if1'];
} else {
  $all_rsinstalacoes_fotos_if1 = mysql_query($query_rsinstalacoes_fotos_if1);
  $totalRows_rsinstalacoes_fotos_if1 = mysql_num_rows($all_rsinstalacoes_fotos_if1);
}
$totalPages_rsinstalacoes_fotos_if1 = ceil($totalRows_rsinstalacoes_fotos_if1/$maxRows_rsinstalacoes_fotos_if1)-1;
//End NeXTenesio3 Special List Recordset

$colname_espaco = "-1";
if (isset($_GET['espid'])) {
  $colname_espaco = $_GET['espid'];
}
mysql_select_db($database_memorial2014, $memorial2014);
$query_espaco = sprintf("SELECT i_titulo FROM intalacoes_i WHERE i_id = %s", GetSQLValueString($colname_espaco, "int"));
$espaco = mysql_query($query_espaco, $memorial2014) or die(mysql_error());
$row_espaco = mysql_fetch_assoc($espaco);
$totalRows_espaco = mysql_num_rows($espaco);

$nav_listinstalacoes_fotos_if1->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../images/instalacoes/{rsinstalacoes_fotos_if1.if_i_id}/");
$objDynamicThumb1->setRenameRule("{rsinstalacoes_fotos_if1.if_imagem}");
$objDynamicThumb1->setResize(100, 80, true);
$objDynamicThumb1->setWatermark(false);
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
  .KT_col_if_imagem {width:140px; overflow:hidden;}
  .KT_col_if_titulo {width:140px; overflow:hidden;}
  .KT_col_if_img_capa {width:140px; overflow:hidden;}
</style>
</head>

<body>
<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>


<div class="KT_tng" id="listinstalacoes_fotos_if1">
  <h1>
    <?php echo $row_espaco['i_titulo']; ?><?php
  $nav_listinstalacoes_fotos_if1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listinstalacoes_fotos_if1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
        <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listinstalacoes_fotos_if1'] == 1) {
?>
          <?php echo $_SESSION['default_max_rows_nav_listinstalacoes_fotos_if1']; ?>
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
  if (@$_SESSION['has_filter_tfi_listinstalacoes_fotos_if1'] == 1) {
?>
          <a href="<?php echo $tfi_listinstalacoes_fotos_if1->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
          <?php 
  // else Conditional region2
  } else { ?>
          <a href="<?php echo $tfi_listinstalacoes_fotos_if1->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
          <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="if_imagem" class="KT_sorter KT_col_if_imagem <?php echo $tso_listinstalacoes_fotos_if1->getSortIcon('instalacoes_fotos_if.if_imagem'); ?>"> <a href="<?php echo $tso_listinstalacoes_fotos_if1->getSortLink('instalacoes_fotos_if.if_imagem'); ?>">imagem</a></th>
            <th id="if_titulo" class="KT_sorter KT_col_if_titulo <?php echo $tso_listinstalacoes_fotos_if1->getSortIcon('instalacoes_fotos_if.if_titulo'); ?>"> <a href="<?php echo $tso_listinstalacoes_fotos_if1->getSortLink('instalacoes_fotos_if.if_titulo'); ?>">titulo</a></th>
            <th id="if_img_capa" class="KT_sorter KT_col_if_img_capa <?php echo $tso_listinstalacoes_fotos_if1->getSortIcon('if_img_capa'); ?>"> <a href="<?php echo $tso_listinstalacoes_fotos_if1->getSortLink('if_img_capa'); ?>">capa</a></th>
<th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listinstalacoes_fotos_if1'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
<td>&nbsp;</td>
              <td><input type="text" name="tfi_listinstalacoes_fotos_if1_if_titulo" id="tfi_listinstalacoes_fotos_if1_if_titulo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listinstalacoes_fotos_if1_if_titulo']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listinstalacoes_fotos_if1_if_img_capa" id="tfi_listinstalacoes_fotos_if1_if_img_capa" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listinstalacoes_fotos_if1_if_img_capa']); ?>" size="10" maxlength="100" /></td>
              <td><input type="submit" name="tfi_listinstalacoes_fotos_if1" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rsinstalacoes_fotos_if1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="5"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rsinstalacoes_fotos_if1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_instalacoes_fotos_if" class="id_checkbox" value="<?php echo $row_rsinstalacoes_fotos_if1['if_id']; ?>" />
                  <input type="hidden" name="if_id" class="id_field" value="<?php echo $row_rsinstalacoes_fotos_if1['if_id']; ?>" /></td>
                <td><div class="KT_col_if_imagem"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></div></td>
                <td><div class="KT_col_if_titulo"><?php echo KT_FormatForList($row_rsinstalacoes_fotos_if1['if_titulo'], 20); ?></div></td>
                <td>
                <?php if($row_rsinstalacoes_fotos_if1['if_img_capa'] == 1) { ?>
                <img src="img/checkbox_true.gif" width="22" height="22" />
                <?php } else { ?>
                <a title="MUDAR PARA CAPA" href="inst_fotos_up.php?ifid=<?php echo $row_rsinstalacoes_fotos_if1['if_id']; ?>&amp;espid=<?php echo $row_rsinstalacoes_fotos_if1['if_i_id']; ?>&amp;up=1"><img src="img/checkbox_false.gif" width="21" height="21" /></a>
                <?php } ?></td>
                <td><a class="KT_edit_link" href="inst_fotos_form.php?if_id=<?php echo $row_rsinstalacoes_fotos_if1['if_id']; ?>&amp;instid=<?php echo $_GET['espid']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></td>
              </tr>
              <?php } while ($row_rsinstalacoes_fotos_if1 = mysql_fetch_assoc($rsinstalacoes_fotos_if1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listinstalacoes_fotos_if1->Prepare();
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
        <a class="KT_additem_op_link" href="inst_fotos_form.php?KT_back=1&amp;instid=<?php echo $_GET['espid']; ?>" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsinstalacoes_fotos_if1);

mysql_free_result($espaco);
?>
