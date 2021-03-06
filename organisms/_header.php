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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- corrigir tamanho no celular -->
    <meta name="viewport" content="width=device-width, user-scalable=no" />
<title>Untitled Document</title>

    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    

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

<div class="container">
  <div class="col-md-12">
        <div class="data_hora">
        <?php include('semana_data_hora.php'); ?>

        &nbsp;-&nbsp;<div id="horas" style="float:right"></div>
        </div>
  </div>

  <div class="col-md-12">
    <div class="cabecario">
          
        <div id="presentation_container" class="pc_container">
            <?php do { ?>
              <div class="pc_item">
                <div class="desc">
                  </br>
                  <h1><strong><?php echo $row_slide['i_titulo']; ?></strong></h1>
                  &nbsp;
                  </div>
                <a href="../espacos_ver.php?espid=<?php echo $row_slide['i_id']; ?>"><img src="<?php echo $objDynamicThumb1->Execute(); ?>" border="0" /></a></div>
              <?php } while ($row_slide = mysql_fetch_assoc($slide)); ?>
        </div>
        <script type="text/javascript">
            presentationCycle.init();
        </script>

        <div class="logo">
          <img src="../images/topo_logo.png" width="334" height="134" />
        </div>

        <div class="acessos">
          <div class="prof">
          <a href="http://colegiomemorial.ultramax.com.br:8080/gestaoescolar/admin" target="_blank"><img src="../images/topo_bt_professores.png" width="128" height="24" border="0" /></a>
          </div>

          <div class="aluno">
          <a href="http://colegiomemorial.ultramax.com.br:8080/gestaoescolar/aluno" target="_blank"><img src="../images/topo_bt_alunos.png" width="135" height="24" border="0" /></a>
          </div>
        </div>

    </div>
  </div>
</div>
 
<?php
mysql_free_result($slide);
?>
