<?php require_once('Connections/memorial2014.php'); ?>
<?php
// Require the MXI classes
require_once ('includes/mxi/MXI.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

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

$colname_espacos = "-1";
if (isset($_GET['espid'])) {
  $colname_espacos = $_GET['espid'];
}
mysql_select_db($database_memorial2014, $memorial2014);
$query_espacos = sprintf("SELECT * FROM intalacoes_i WHERE i_id = %s", GetSQLValueString($colname_espacos, "int"));
$espacos = mysql_query($query_espacos, $memorial2014) or die(mysql_error());
$row_espacos = mysql_fetch_assoc($espacos);
$totalRows_espacos = mysql_num_rows($espacos);

$colname_fotos = "-1";
if (isset($_GET['espid'])) {
  $colname_fotos = $_GET['espid'];
}
mysql_select_db($database_memorial2014, $memorial2014);
$query_fotos = sprintf("SELECT * FROM instalacoes_fotos_if WHERE if_i_id = %s", GetSQLValueString($colname_fotos, "int"));
$fotos = mysql_query($query_fotos, $memorial2014) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
$totalRows_fotos = mysql_num_rows($fotos);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb2->setFolder("images/instalacoes/{fotos.if_i_id}/");
$objDynamicThumb2->setRenameRule("{fotos.if_imagem}");
$objDynamicThumb2->setResize(250, 150, true);
$objDynamicThumb2->setWatermark(false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Colegio Memorial ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
<!-- LIGHTBOX 
<script type="text/javascript" src="lightbox/js/prototype.js"></script>
<script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="lightbox/js/lightbox.js"></script>
<link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" />
 LIGHTBOX FIM -->

<!-- FANCYBOX -->
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 	<link rel="stylesheet" href="fancybox/style.css" />
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
	</script>
<!-- FANCYBOX FIM -->

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
            
       
      <div class="cleaner h30"> 
        <h3><strong>	&nbsp;<?php echo $row_espacos['i_titulo']; ?></strong></h3>
    </div>
        <div>
		
		   <div class="cleaner"></div>
      </div>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="top"><table border="0">
          <tr>
            <?php
  do { // horizontal looper version 3
?>
              <td valign="top" onMouseOver="this.style.backgroundColor='#E1E1E1';" onMouseOut="this.style.backgroundColor='';" style="border:1px solid #999">
              <a rel="example_group" href="images/instalacoes/<?php echo $row_fotos['if_i_id']; ?>/<?php echo $row_fotos['if_imagem']; ?>" title="- <?php echo $row_fotos['if_titulo']; ?>: <?php echo $row_fotos['if_texto']; ?>">
              <table border="0" cellspacing="10" cellpadding="0">
                <tr>
                  <td width="200" height="150" valign="top" style="background-image:url(<?php echo $objDynamicThumb2->Execute(); ?>); background-position:center">&nbsp;</td>
                </tr>
                <tr>
                  <td><?php echo $row_fotos['if_titulo']; ?></td>
                </tr>
              </table>
              </a>
              </td>
              <?php
    $row_fotos = mysql_fetch_assoc($fotos);
    if (!isset($nested_fotos)) {
      $nested_fotos= 1;
    }
    if (isset($row_fotos) && is_array($row_fotos) && $nested_fotos++ % 3==0) {
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
mysql_free_result($espacos);

mysql_free_result($fotos);
?>
