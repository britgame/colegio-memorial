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

$colname_atividades = "-1";
if (isset($_GET['atvid'])) {
  $colname_atividades = $_GET['atvid'];
}
mysql_select_db($database_memorial2014, $memorial2014);
$query_atividades = sprintf("SELECT * FROM atividades WHERE atv_id = %s", GetSQLValueString($colname_atividades, "int"));
$atividades = mysql_query($query_atividades, $memorial2014) or die(mysql_error());
$row_atividades = mysql_fetch_assoc($atividades);
$totalRows_atividades = mysql_num_rows($atividades);

// Begin File List Recordset
$listFolder_fotos = new tNG_FileListRecordset("", $conn_memorial2014);
$listFolder_fotos->setBaseFolder("images/atividades/");
$listFolder_fotos->setFolder("{atividades.atv_id}");
$listFolder_fotos->setOrder("name", "ASC");
$listFolder_fotos->setAllowedExtensions("bmp, jpg, jpeg, gif, png");
// Create the fake recordset
$fotos = $listFolder_fotos->Execute();
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = $listFolder_fotos->RecordCount();
// End File List Recordset

// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("images/atividades/");
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
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    
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

<div id="templatemo_wrapper">

	 
    
    <!-- end of templatemo header -->
  <!-- end of middle -->
    
    <div id="templatemo_main">
      <div class="col_w900  col_w900_last">
      </div>
      <div class="conteudo col_w900" style="background-color:#FFF;">
        <div>
		
	      <div class="cleaner"></div>
      </div>
          <table width="95%" border="0" align="center" cellpadding="5" cellspacing="5">
            <tr>
              <td><?php echo $row_atividades['atv_data']; ?></td>
            </tr>
            <tr>
              <td><strong><?php echo $row_atividades['atv_titulo']; ?></strong></td>
            </tr>
            <tr>
              <td><?php echo $row_atividades['atv_texto']; ?></td>
            </tr>
            <tr>
              <td><table border="0">
                <tr>
                  <?php
  do { // horizontal looper version 3
?>
                    <td><table width="180" border="0" cellspacing="10" cellpadding="5">
                      <tr>
                        <td align="center" style="border:1px solid #999"><a rel="galeria_group" href="images/atividades/<?php echo $row_fotos['fullname']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></td>
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
              </table></td>
            </tr>
          </table>
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
mysql_free_result($atividades);
?>
