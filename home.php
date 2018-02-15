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

$maxRows_galeria = 4;
$pageNum_galeria = 0;
if (isset($_GET['pageNum_galeria'])) {
  $pageNum_galeria = $_GET['pageNum_galeria'];
}
$startRow_galeria = $pageNum_galeria * $maxRows_galeria;

mysql_select_db($database_memorial2014, $memorial2014);
$query_galeria = "SELECT * FROM galeria_g WHERE g_destaque = 1 ORDER BY g_id DESC";
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

mysql_select_db($database_memorial2014, $memorial2014);
$query_patrocinadores = "SELECT ptr_img, ptr_link FROM patrocinadores_ptr";
$patrocinadores = mysql_query($query_patrocinadores, $memorial2014) or die(mysql_error());
$row_patrocinadores = mysql_fetch_assoc($patrocinadores);
$totalRows_patrocinadores = mysql_num_rows($patrocinadores);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Colegio Memorial</title>
<link rel="shortcut icon" href="images/ico.ico" type="image/ico" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- include jQuery library -->
<style type="text/css">
.fadein { position:relative; }
.fadein img { 
position:absolute; 
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  max-width: 100%;
  max-height: 100%;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script language="JavaScript1.2" type="text/javascript">
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
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function muda_banner(img){

	var banner = document.getElementById("img_banner");
	var menu = document.getElementById("img_menu");
	banner.src = "images/" + img;

}
</script>
<script src="Scripts/script_menu.js"></script>

<script type="text/javascript">
$(function(){
    $('.fadein img:gt(0)').hide();
    setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
</script>
</head>
<body onload="MM_preloadImages('images/ativ-botao-on.png','images/menu-banner_r3_c1_s2.png','images/menu-banner_r5_c1_s2.png')">

<div id="fb-root"><a name="top" id="top"></a></div>
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
    
    <div id="templatemo_main">
    <div>
    <table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="900">
<!-- fwtable fwsrc="Sem título" fwpage="Página 1" fwbase="ban-sup.jpg" fwstyle="Dreamweaver" fwdocid = "773374877" fwnested="0" -->
  <tr>
   <td width="241" height="1"></td>
   <td  width="659" height="1"></td>
   <td width="1" height="1"></td>
  </tr>

  <tr>
   <td>
   <table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="239">
<!-- fwtable fwsrc="Sem título" fwpage="Página 1" fwbase="menu-banner.png" fwstyle="Dreamweaver" fwdocid = "1163430818" fwnested="0" -->
  <tr>
   <td width="239" height="1"></td>
   <td width="1" height="1"></td>
  </tr>

  <tr>
   <td><a href="<?php echo domain; ?>/atividades" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('menubanner_r1_c1','','images/menu-banner_r1_c1_s2.png',1); muda_banner('banner_atividades.JPG');" id="img_menu"><img name="menubanner_r1_c1" src="images/menu-banner_r1_c1.png" width="239" height="97" id="menubanner_r1_c1" alt="" /></a></td>
   <td><img src="spacer.gif" width="1" height="95" alt="" /></td>
  </tr>
  <tr>
   <td><img name="menubanner_r2_c1" src="images/menu-banner_r2_c1.png" width="239" height="6" id="menubanner_r2_c1" alt="" /></td>
   <td><img src="spacer.gif" width="1" height="6" alt="" /></td>
  </tr>
  <tr>
   <td><a href="<?php echo domain; ?>/missao-e-filosofia" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('menubanner_r3_c1','','images/menu-banner_r3_c1_s2.png',1); muda_banner('banner_missao.jpg');" id="img_menu"><img name="menubanner_r3_c1" src="images/menu-banner_r3_c1.png" width="239" height="95" id="menubanner_r3_c1" alt="" /></a></td>
   <td><img src="spacer.gif" width="1" height="95" alt="" /></td>
  </tr>
  <tr>
   <td><img name="menubanner_r4_c1" src="images/menu-banner_r4_c1.png" width="239" height="6" id="menubanner_r4_c1" alt="" /></td>
   <td><img src="spacer.gif" width="1" height="6" alt="" /></td>
  </tr>
  <tr>
   <td><a href="<?php echo domain; ?>/contato" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('menubanner_r5_c1','','images/menu-banner_r5_c1_s2.png',1); muda_banner('banner_contato.jpg');" id="img_menu"><img name="menubanner_r5_c1" src="images/menu-banner_r5_c1.png" width="239" height="95" id="menubanner_r5_c1" alt="" /></a></td>
   <td><img src="spacer.gif" width="1" height="95" alt="" /></td>
  </tr>
  <tr>
   <td><img name="menubanner_r6_c1" src="menu-banner_r6_c1.png" width="239" height="2" id="menubanner_r6_c1" alt="" /></td>
   <td><img src="spacer.gif" width="1" height="2" alt="" /></td>
  </tr>
</table>
   
   </td>
   <td><img name="img_banner" src="images/banner_atividades.JPG" width="659" height="299" id="img_banner" /></td>
   <td  width="1" height="299"></td>
  </tr>
</table>
     </div>
      <div class="col_w900  col_w900_last">
		  <p>&nbsp;</p>	
            <div class="cleaner"></div>
      </div>    
    	 <div class="col_allw280 fp_service_box">
                <div><a href="<?php echo domain; ?>/a-escola"><img src="images/escola.jpg" width="280" height="357" /></a></div>
          
    	 </div>
      <div class="col_allw280 fp_service_box">
                <div><a href="<?php echo domain; ?>/cursos"><img src="images/cursos.png" width="280" height="357" /></a></div>
            
      </div>
            
            
            
            <div class="col_allw280 fp_service_box col_last">
                <div><a href="http://www.colegiomemorialjdi.blogspot.com.br/" target="_blank"><img src="images/blog.png" width="280" height="359" /></a></div>
            
            </div>
            
       
          <div class="cleaner h20"></div>
          
        <div id="destaque_01"  style="background-color:#FFF;">
         <div>
           <table width="435" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td height="38" bgcolor="#2D2F7A" style="font-size:18px; color:#FFF"><strong>&nbsp;&nbsp;PATROCINADORES AGITAMEMO</strong></td>
             </tr>
           </table>
         </div>
         <table width="435" border="0" cellspacing="0" cellpadding="10">
           <tr>
             <td align="center">
             
             <div class="fadein" style="height:110px;"> 
               <?php if(isset($row_patrocinadores['ptr_img'])) { ?>
			   <?php do { ?>
               <?php if(isset($row_patrocinadores['ptr_link'])) { ?><a href="<?php echo $row_patrocinadores['ptr_link']; ?>" target="_blank"><?php } ?>
               <img src="images/patrocinadores/<?php echo $row_patrocinadores['ptr_img']; ?>" alt"" />
<?php if(isset($row_patrocinadores['ptr_link'])) { ?></a><?php } ?>
                 <?php } while ($row_patrocinadores = mysql_fetch_assoc($patrocinadores)); ?>
             <?php } else { ?>Nenhum registro encontrado.<?php } ?></div>
             </td>
           </tr>
         </table>
<div style="background-color:#2D2F7A; height:40px;"></div>
      </div>
        <div id="destaque_02"> <a href="<?php echo domain; ?>/trabalhe-conosco"><img src="images/trabalhe.png" width="435" height="208" /></a></div>
                <div class="cleaner h20"></div>
  </div>
</div> <!-- end of main -->

</div> 
<!-- wrapper -->
<?php
  // footer
  mxi_includes_start("organisms/_rodape.php");
  require(basename("organisms/_rodape.php"));
  mxi_includes_end();
?>
</body>
</html>
<?php
mysql_free_result($galeria);

mysql_free_result($patrocinadores);
?>
