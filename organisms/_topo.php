<?php require_once('../Connections/memorial2014.php'); ?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

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
$query_slide = "SELECT instalacoes_fotos_if.if_imagem, instalacoes_fotos_if.if_img_capa, intalacoes_i.i_titulo, intalacoes_i.i_id FROM (intalacoes_i LEFT JOIN instalacoes_fotos_if ON instalacoes_fotos_if.if_i_id=intalacoes_i.i_id) WHERE instalacoes_fotos_if.if_img_capa = 1";
$slide = mysql_query($query_slide, $memorial2014) or die(mysql_error());
$row_slide = mysql_fetch_assoc($slide);
$totalRows_slide = mysql_num_rows($slide);


// Show Dynamic Thumbnail
$objDynamicThumb1 = new tNG_DynamicThumbnail("", "KT_thumbnail1");
$objDynamicThumb1->setFolder("../images/instalacoes/{slide.i_id}/");
$objDynamicThumb1->setRenameRule("{slide.if_imagem}");
$objDynamicThumb1->setResize(200, 180, true);
$objDynamicThumb1->setWatermark(false);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- corrigir tamanho no celular -->
    <meta name="viewport" content="width=device-width, user-scalable=no" />

    <title>Untitled Document</title>

    <!-- p/ o FontAwesome no IE -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">

    <link href="../css/style.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="../slide/css/presentationCycle.css" />
    <script type='text/javascript' src='../slide/js/jquery.cycle.all.min.js'></script>
    <script type='text/javascript' src='../slide/js/presentationCycle.js'></script>
    
<script type="text/javascript">
function relogio(){
	var data = new Date();
 /* var dia = data.getDate();
	var mes = data.getMonth();
	var ano = data.getFullYear(); */
	var horas = data.getHours();
	var minutos = data.getMinutes();
	var exibe = document.getElementById("horas");
	exibe.innerHTML = + horas + "h" + minutos;
}
setInterval(relogio, 1000);
</script>
</head>

<body>
<table class="data_hora" width="900" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td height="20" align="right">

<?php include('semana_data_hora.php'); ?>

&nbsp;-&nbsp;<div id="horas" style="float:right"></div>
    </td>
  </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="geral_topo">
  <tr style="background-image:url(images/topo.png); background-position:center; background-repeat: repeat-y;">
    <td valign="middle"><table border="0" class="cabecario">
      <tr>
        <td width="48%" align="left" valign="middle" class="slide_top">
      <div id="presentation_container" class="pc_container">
            <?php do { ?>
              <div class="pc_item">
                <div class="desc">
                  </br>
                  <p><strong><?php echo $row_slide['i_titulo']; ?></strong></p>
                  &nbsp;
                  </div>
                <a href="../espacos_ver.php?espid=<?php echo $row_slide['i_id']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></div>
              <?php } while ($row_slide = mysql_fetch_assoc($slide)); ?>
        </div>
         <script type="text/javascript">
            presentationCycle.init();
        </script>
        </td>
        <td width="52%" align="right"><table border="0">
          <tr>
            <td align="right" class="sumir_mobi">Rua Carlos Gomes, 240<br />
              Ponte São Josão - Jundiaí/SP<br />
              Fone: 11 4526.2322</td>
            <td align="right"><img src="../images/logo_colegio_memorial_topo.png" width="134" height="134" alt="logo-colegio-memorial-topo" /></td>
          </tr>
          <tr class="sumir_mobi">
            <td align="right"><a href="http://colegiomemorial.ultramax.com.br:8080/gestaoescolar/admin" target="_blank"><img src="../images/topo_bt_professores.png" width="128" height="24" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="right"><a href="http://colegiomemorial.ultramax.com.br:8080/gestaoescolar/aluno" target="_blank"><img src="../images/topo_bt_alunos.png" width="135" height="24" border="0" /></a></td>
          </tr>
        </table></td>
      </tr>
    </table>
 
      </td>
  </tr>
</table>
<div class="menu_horizontal">
<?php
  mxi_includes_start("_menu_horizontal_topo.php");
  require(basename("_menu_horizontal_topo.php"));
  mxi_includes_end();
?>
</div>

<?php
  mxi_includes_start("_menu_mobile.php");
  require(basename("_menu_mobile.php"));
  mxi_includes_end();
?>

</body>
</html>
<?php
mysql_free_result($slide);
?>
