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

mysql_select_db($database_memorial2014, $memorial2014);
$query_instalacoes = "SELECT instalacoes_fotos_if.if_imagem, instalacoes_fotos_if.if_img_capa, intalacoes_i.i_titulo, intalacoes_i.i_id FROM (intalacoes_i LEFT JOIN instalacoes_fotos_if ON instalacoes_fotos_if.if_i_id=intalacoes_i.i_id) WHERE instalacoes_fotos_if.if_img_capa = 1";
$instalacoes = mysql_query($query_instalacoes, $memorial2014) or die(mysql_error());
$row_instalacoes = mysql_fetch_assoc($instalacoes);
$totalRows_instalacoes = mysql_num_rows($instalacoes);

mysql_select_db($database_memorial2014, $memorial2014);
$query_paginas = "SELECT p_texto FROM paginas_p WHERE p_id = 2";
$paginas = mysql_query($query_paginas, $memorial2014) or die(mysql_error());
$row_paginas = mysql_fetch_assoc($paginas);
$totalRows_paginas = mysql_num_rows($paginas);

// Show Dynamic Thumbnail
$objDynamicThumb2 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb2->setFolder("images/instalacoes/{instalacoes.i_id}/");
$objDynamicThumb2->setRenameRule("{instalacoes.if_imagem}");
$objDynamicThumb2->setResize(200, 180, true);
$objDynamicThumb2->setWatermark(false);

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
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
    </script>
<script type="text/javascript" src="js/swfobject.js"></script>
<!--<script type="text/javascript">
	var flashvars = {};
	flashvars.xml_file = "photo_list.xml";
	var params = {};
	params.wmode = "transparent";
	var attributes = {};
	attributes.id = "slider";
	swfobject.embedSWF("flash_slider.swf", "flash_grid_slider", "440", "220", "9.0.0", false, flashvars, params, attributes);			
</script>-->
        

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<!--<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>-->
</head>
<body onload="MM_preloadImages('images/ir_top_ovr.png')">
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
        <h3><strong>	&nbsp;Espaços</strong></h3>
    </div>
          <div>
		
		   <div class="cleaner"></div>
      </div></td>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><p>&nbsp;</p>
                <?php echo $row_paginas['p_texto']; ?>
              </td>
            </tr>
          </table>
      <table width="800" border="0" align="center">
        <tr>
          <td align="center"><table border="0" align="center" width="100%">
            <tr>
              <?php
  do { // horizontal looper version 3
?>
                <td align="center"><a href="../espacos_ver.php?espid=<?php echo $row_instalacoes['i_id']; ?>"><img src="<?php echo $objDynamicThumb2->Execute(); ?>" border="0" /><br />
                  <strong><?php echo $row_instalacoes['i_titulo']; ?></strong></a></td>
                <?php
    $row_instalacoes = mysql_fetch_assoc($instalacoes);
    if (!isset($nested_instalacoes)) {
      $nested_instalacoes= 1;
    }
    if (isset($row_instalacoes) && is_array($row_instalacoes) && $nested_instalacoes++ % 3==0) {
      echo "</tr><tr>";
    }
  } while ($row_instalacoes); //end horizontal looper version 3
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
mysql_free_result($instalacoes);

mysql_free_result($paginas);
?>
