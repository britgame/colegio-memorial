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
$tfi_listpatrocinadores_ptr1 = new TFI_TableFilter($conn_memorial2014, "tfi_listpatrocinadores_ptr1");
$tfi_listpatrocinadores_ptr1->addColumn("patrocinadores_ptr.ptr_img", "STRING_TYPE", "ptr_img", "%");
$tfi_listpatrocinadores_ptr1->addColumn("patrocinadores_ptr.ptr_link", "STRING_TYPE", "ptr_link", "%");
$tfi_listpatrocinadores_ptr1->Execute();

// Sorter
$tso_listpatrocinadores_ptr1 = new TSO_TableSorter("rspatrocinadores_ptr1", "tso_listpatrocinadores_ptr1");
$tso_listpatrocinadores_ptr1->addColumn("patrocinadores_ptr.ptr_img");
$tso_listpatrocinadores_ptr1->addColumn("patrocinadores_ptr.ptr_link");
$tso_listpatrocinadores_ptr1->setDefault("patrocinadores_ptr.ptr_img DESC");
$tso_listpatrocinadores_ptr1->Execute();

// Navigation
$nav_listpatrocinadores_ptr1 = new NAV_Regular("nav_listpatrocinadores_ptr1", "rspatrocinadores_ptr1", "../", $_SERVER['PHP_SELF'], 10);

//NeXTenesio3 Special List Recordset
$maxRows_rspatrocinadores_ptr1 = $_SESSION['max_rows_nav_listpatrocinadores_ptr1'];
$pageNum_rspatrocinadores_ptr1 = 0;
if (isset($_GET['pageNum_rspatrocinadores_ptr1'])) {
  $pageNum_rspatrocinadores_ptr1 = $_GET['pageNum_rspatrocinadores_ptr1'];
}
$startRow_rspatrocinadores_ptr1 = $pageNum_rspatrocinadores_ptr1 * $maxRows_rspatrocinadores_ptr1;

// Defining List Recordset variable
$NXTFilter_rspatrocinadores_ptr1 = "1=1";
if (isset($_SESSION['filter_tfi_listpatrocinadores_ptr1'])) {
  $NXTFilter_rspatrocinadores_ptr1 = $_SESSION['filter_tfi_listpatrocinadores_ptr1'];
}
// Defining List Recordset variable
$NXTSort_rspatrocinadores_ptr1 = "patrocinadores_ptr.ptr_img";
if (isset($_SESSION['sorter_tso_listpatrocinadores_ptr1'])) {
  $NXTSort_rspatrocinadores_ptr1 = $_SESSION['sorter_tso_listpatrocinadores_ptr1'];
}
mysql_select_db($database_memorial2014, $memorial2014);

$query_rspatrocinadores_ptr1 = "SELECT patrocinadores_ptr.ptr_img, patrocinadores_ptr.ptr_link, patrocinadores_ptr.ptr_id FROM patrocinadores_ptr WHERE {$NXTFilter_rspatrocinadores_ptr1} ORDER BY {$NXTSort_rspatrocinadores_ptr1}";
$query_limit_rspatrocinadores_ptr1 = sprintf("%s LIMIT %d, %d", $query_rspatrocinadores_ptr1, $startRow_rspatrocinadores_ptr1, $maxRows_rspatrocinadores_ptr1);
$rspatrocinadores_ptr1 = mysql_query($query_limit_rspatrocinadores_ptr1, $memorial2014) or die(mysql_error());
$row_rspatrocinadores_ptr1 = mysql_fetch_assoc($rspatrocinadores_ptr1);

if (isset($_GET['totalRows_rspatrocinadores_ptr1'])) {
  $totalRows_rspatrocinadores_ptr1 = $_GET['totalRows_rspatrocinadores_ptr1'];
} else {
  $all_rspatrocinadores_ptr1 = mysql_query($query_rspatrocinadores_ptr1);
  $totalRows_rspatrocinadores_ptr1 = mysql_num_rows($all_rspatrocinadores_ptr1);
}
$totalPages_rspatrocinadores_ptr1 = ceil($totalRows_rspatrocinadores_ptr1/$maxRows_rspatrocinadores_ptr1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listpatrocinadores_ptr1->checkBoundries();

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("../", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../images/patrocinadores/");
$objDynamicThumb1->setRenameRule("{rspatrocinadores_ptr1.ptr_img}");
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
  .KT_col_ptr_img {width:140px; overflow:hidden;}
  .KT_col_ptr_link {width:140px; overflow:hidden;}
</style>
</head>

<body>
<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>
<table width="900" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>&nbsp;
      <div class="KT_tng" id="listpatrocinadores_ptr1">
        <h1> Patrocinadores
          <?php
  $nav_listpatrocinadores_ptr1->Prepare();
  require("../includes/nav/NAV_Text_Statistics.inc.php");
?>
        </h1>
        <div class="KT_tnglist">
          <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
            <div class="KT_options"> <a href="<?php echo $nav_listpatrocinadores_ptr1->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
              <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listpatrocinadores_ptr1'] == 1) {
?>
                <?php echo $_SESSION['default_max_rows_nav_listpatrocinadores_ptr1']; ?>
                <?php 
  // else Conditional region1
  } else { ?>
                <?php echo NXT_getResource("all"); ?>
                <?php } 
  // endif Conditional region1
?>
              <?php echo NXT_getResource("records"); ?></a> &nbsp;
              &nbsp; </div>
            <table cellpadding="2" cellspacing="0" class="KT_tngtable">
              <thead>
                <tr class="KT_row_order">
                  <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
                  </th>
                  <th id="ptr_img" class="KT_sorter KT_col_ptr_img <?php echo $tso_listpatrocinadores_ptr1->getSortIcon('patrocinadores_ptr.ptr_img'); ?>"> <a href="<?php echo $tso_listpatrocinadores_ptr1->getSortLink('patrocinadores_ptr.ptr_img'); ?>">imagem</a></th>
                  <th id="ptr_link" class="KT_sorter KT_col_ptr_link <?php echo $tso_listpatrocinadores_ptr1->getSortIcon('patrocinadores_ptr.ptr_link'); ?>"> <a href="<?php echo $tso_listpatrocinadores_ptr1->getSortLink('patrocinadores_ptr.ptr_link'); ?>">link</a></th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($totalRows_rspatrocinadores_ptr1 == 0) { // Show if recordset empty ?>
                  <tr>
                    <td colspan="4"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
                  </tr>
                  <?php } // Show if recordset empty ?>
                <?php if ($totalRows_rspatrocinadores_ptr1 > 0) { // Show if recordset not empty ?>
                  <?php do { ?>
                    <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                      <td><input type="checkbox" name="kt_pk_patrocinadores_ptr" class="id_checkbox" value="<?php echo $row_rspatrocinadores_ptr1['ptr_id']; ?>" />
                        <input type="hidden" name="ptr_id" class="id_field" value="<?php echo $row_rspatrocinadores_ptr1['ptr_id']; ?>" /></td>
                      <td><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></td>
                      <td><div class="KT_col_ptr_link"><?php echo KT_FormatForList($row_rspatrocinadores_ptr1['ptr_link'], 20); ?></div></td>
                      <td><a class="KT_edit_link" href="patrocinadores_form.php?ptr_id=<?php echo $row_rspatrocinadores_ptr1['ptr_id']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a></td>
                    </tr>
                    <?php } while ($row_rspatrocinadores_ptr1 = mysql_fetch_assoc($rspatrocinadores_ptr1)); ?>
                  <?php } // Show if recordset not empty ?>
              </tbody>
            </table>
            <div class="KT_bottomnav">
              <div>
                <?php
            $nav_listpatrocinadores_ptr1->Prepare();
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
              <a class="KT_additem_op_link" href="patrocinadores_form.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a></div>
          </form>
        </div>
        <br class="clearfixplain" />
      </div>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rspatrocinadores_ptr1);
?>
