<?php require_once('Connections/memorial2014.php'); ?>
<?php
// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Require the MXI classes
require_once ('includes/mxi/MXI.php');

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

$maxRows_galeria = 4;
$pageNum_galeria = 0;
if (isset($_GET['pageNum_galeria'])) {
  $pageNum_galeria = $_GET['pageNum_galeria'];
}
$startRow_galeria = $pageNum_galeria * $maxRows_galeria;

$colname_galeria = "-1";
if (isset($_GET['gid'])) {
  $colname_galeria = $_GET['gid'];
}
mysql_select_db($database_memorial2014, $memorial2014);
$query_galeria = sprintf("SELECT g_id, g_descricao, g_data FROM galeria_g WHERE g_id = %s", GetSQLValueString($colname_galeria, "int"));
$query_limit_galeria = sprintf("%s LIMIT %d, %d", $query_galeria, $startRow_galeria, $maxRows_galeria);
$galeria = mysql_query($query_limit_galeria, $memorial2014) or die(mysql_error());
$row_galeria = mysql_fetch_assoc($galeria);

if (isset($_GET['totalRows_galeria'])) {
  $totalRows_galeria = $_GET['totalRows_galeria'];
} else {
  $all_galeria = mysql_query($query_galeria);
  $totalRows_galeria = mysql_num_rows($all_galeria);
}
$totalPages_galeria = ceil($totalRows_galeria/$maxRows_galeria)-1;

// Begin File List Recordset
$listFolder_fotos = new tNG_FileListRecordset("", $conn_memorial2014);
$listFolder_fotos->setBaseFolder("images/galeria/");
$listFolder_fotos->setFolder("{galeria.g_id}");
$listFolder_fotos->setOrder("name", "ASC");
$listFolder_fotos->setAllowedExtensions("bmp, jpg, jpeg, gif, png");
// Create the fake recordset
$fotos = $listFolder_fotos->Execute();
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = $listFolder_fotos->RecordCount();
// End File List Recordset

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/galeria/");
$objDynamicThumb1->setRenameRule("{fotos.fullname}");
$objDynamicThumb1->setResize(180, 120, true);
$objDynamicThumb1->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Colegio Memorial ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    
 <script type="text/javascript">
 $(document).ready(function() {
							
 $("a[rel=galeria_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
});
 </script>
</head>
<body>
<?php
  mxi_includes_start("organisms/_topo.php");
  require(basename("organisms/_topo.php"));
  mxi_includes_end();
?>
<?php
  mxi_includes_start("organisms/_menu_horizontal_topo.php");
  require(basename("organisms/_menu_horizontal_topo.php"));
  mxi_includes_end();
?>

<div id="templatemo_wrapper">

	 
    
    <!-- end of templatemo header -->
  <!-- end of middle -->
    
    <div id="templatemo_main">
      <div class="col_w900  col_w900_last">
      </div>
      <div class="col_w900" style="background-color:#FFF;">
            
       
      <div class="cleaner h30"> 
        <h3><strong>	&nbsp;<?php echo $row_galeria['g_descricao']; ?></strong></h3>
    </div>
          <div>
		
		   <div class="cleaner">
             <table border="0">
               <tr>
                 <?php
  do { // horizontal looper version 3
?>
                   <td><table width="180" border="0" cellspacing="20" cellpadding="10">
                     <tr>
                       <td align="center" style="border:1px solid #999"><a rel="galeria_group" href="images/galeria/<?php echo $row_fotos['fullname']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></td>
                     </tr>
                   </table></td>
                   <?php
    $row_fotos = mysql_fetch_assoc($fotos);
    if (!isset($nested_fotos)) {
      $nested_fotos= 1;
    }
    if (isset($row_fotos) && is_array($row_fotos) && $nested_fotos++ % 4==0) {
      echo "</tr><tr>";
    }
  } while ($row_fotos); //end horizontal looper version 3
?>
               </tr>
             </table>
		   </div>
      </div>

		
            
            
            
         
                
            <div class="cleaner"></div>
      </div>
    	<div class="cleaner"></div>
  </div> <!-- end of main -->

</div> 
<!-- wrapper -->


<?php
  mxi_includes_start("organisms/_rodape.php");
  require(basename("organisms/_rodape.php"));
  mxi_includes_end();
?>
    

</body>
</html>
<?php
mysql_free_result($galeria);
?>
