<?php
// Require the MXI classes
require_once ('includes/mxi/MXI.php');
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
							
$("#iframe_infantil").fancybox({
				'width'				: '50%',
				'height'			: '50%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
$("#iframe_fundamental").fancybox({
				'width'				: '50%',
				'height'			: '50%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
});
 </script>
</head>
<body>
<?php
  mxi_includes_start("_topo.php");
  require(basename("_topo.php"));
  mxi_includes_end();
?>
<?php
  mxi_includes_start("_menu_horizontal_topo.php");
  require(basename("_menu_horizontal_topo.php"));
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
        <h3><strong>	&nbsp;Contato</strong></h3>
    </div>
          <div>
		
		   <div class="cleaner"></div>
      </div>
          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><p><strong><br />
              <span style="color:#F60">Unidade de Educação Infantil:</span>
                
              </strong></span></p>
                <p><strong>Correspondência:</strong> Colégio Memorial - Avenida Padre Angelo Cremonti, 132 – Ponte São João - Cep 13.216-080 – Jundiaí - SP </p>
                <p><strong>Telefone:</strong> (11) <strong>4526-2322</strong></p>
                <p><strong>E-mails:
                  
                  
              </strong><a id="iframe_infantil" href="contatos_infantil.html" title="Unidade de Educação Infantil:"><strong>Clique aqui para enviar e-mail para o setor desejado</strong></a></p>
              <p>&nbsp;</p>
              <p><strong><span style="color:#F60">Unidade de Ensino Fundamental (1a . a 9a . série) e Ensino Médio:</span></strong></p>
              <p><strong>Correspondência:</strong> Colégio Memorial - Rua Carlos Gomes, 240 – Ponte São João - Cep 13.218-005 – Jundiaí - SP </p>
              <p><strong>Telefone:</strong> (11) <strong>4526-2322 </strong></p>
              <p><strong>E-mails:</strong> <a id="iframe_fundamental" href="contatos_fundamental.html" title="Unidade de Ensino Fundamental (1a . a 9a . série) e Ensino Médio:"><strong>Clique aqui para enviar e-mail para o setor desejado</strong></a><a href="contatos_fundamental.html"></a></p>
              <p><strong>Professores:</strong> informe-se com cada um deles </p></td>
            </tr>
          </table>
<div class="cleaner"></div>
      </div>
    	<div class="cleaner"></div>
  </div> <!-- end of main -->

</div> 
<!-- wrapper -->


<?php
  mxi_includes_start("_rodape.php");
  require(basename("_rodape.php"));
  mxi_includes_end();
?>
    

</body>
</html>