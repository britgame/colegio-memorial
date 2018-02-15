<?php
        if(isset($_POST['acao']) && $_POST['acao'] == 'enviar'){
            require('trabalhe_enviar.php');    
        }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sem t&iacute;tulo</title>
<link href="css/form.css" rel="stylesheet" type="text/css">
<style type="text/css">
p#msg {
	font-size:14px;
	font-weight:bold;
	color:#F60;
	text-align:center;
	border:1px solid #999;
	padding:10px;
	background-color:#FFC;
}
</style>
</head>

<body>
<?php
        if(isset($msg))
         echo "<p id=\"msg\">$msg</p>";
    ?>
<form action="" method="post" enctype="multipart/form-data" style="MARGIN-TOP: 0px; margin-bottom: 0px; ">
                  <p>&nbsp;</p>
<table width="270" border="0" align="center" cellpadding="0" cellspacing="0">
                    <!--DWLayoutTable-->
                    <tr>
                      <td width="404" height="20" valign="top" class="s1"><div align="right">nome</div></td> 
                      <td width="9">&nbsp;</td>
                      <td colspan="2" valign="top" class="s1"><input name="nome" type="text" class="campoform">                          </td>
                    </tr>
                    <tr>
                      <td height="18"></td>
                        <td></td>
                        <td width="359"></td>
                      <td width="235"></td>
    </tr>
                    <tr>
                      <td height="20" valign="top" class="s1"><div align="right">e-mail</div></td>
                        <td></td>
                        <td colspan="2" valign="top"><span class="txt">
                           <input name="email" type="text" class="campoform" />
                        </span></td>
                    </tr>
                    <tr>
                      <td height="15"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                      <td height="30" valign="top" class="s1"><div align="right">mensagem</div></td>
                        <td></td>
                        <td colspan="2" rowspan="2" valign="top"><textarea name="mensagem" class="modelo1"></textarea></td>
                    </tr>
                    <tr>
                      <td height="82"></td>
                        <td></td>
                    </tr>
                    <tr>
                      <td height="10"></td>
                        <td></td>
                        <td class="s1">somente arquivos: <SPAN style="color:#F90">doc, docx, pdf e jpg</SPAN></td>
                        <td align="right" class="s1">max. <SPAN style="color:#F90">500kb</SPAN></td>
                    </tr>
                    <tr>
                      <td height="7" align="right" class="s1">anexar</td>
                      <td></td>
                      <td colspan="2"><input type="file" name="arquivo" id="arquivo" class="campoform" ></td>
                    </tr>
                    <tr>
                      <td height="15"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                      <td height="35"></td>
                        <td></td>
                        <td colspan="2" valign="top">
                          <div align="right">
                            <input style="background-color:#666666; color:#FFFFFF; border:2px solid #929292" onMouseOver="this.style.backgroundColor='#FFFFFF'; this.style.border='2px solid #929292'; this.style.color='#999999'" onMouseOut="this.style.backgroundColor='#666666'; this.style.color='#FFFFFF'" type="submit" name="button" id="button" value="enviar">
                        </div></td>
                    </tr>
  </table>
<input type="hidden" name="acao" value="enviar" />
</form>
</body>
</html>