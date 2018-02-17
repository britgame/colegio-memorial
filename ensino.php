<?php require_once('Connections/memorial2014.php'); ?>
<?php
// Require the MXI classes
require_once ('includes/mxi/MXI.php');

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
$query_paginas = "SELECT p_texto FROM paginas_p WHERE p_id = 7";
$paginas = mysql_query($query_paginas, $memorial2014) or die(mysql_error());
$row_paginas = mysql_fetch_assoc($paginas);
$totalRows_paginas = mysql_num_rows($paginas);
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
        <h3><strong>	&nbsp;Ensino e Aprendizagem</strong></h3>
    </div>
          <div>
		
		   <div class="cleaner"></div>
      </div>
          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><p>&nbsp;</p>
              <?php echo $row_paginas['p_texto']; ?>
              </td>
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
mysql_free_result($paginas);
?>
