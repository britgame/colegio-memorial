<?php

/*setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set('America/Sao_Paulo');

$date = date('Y-m-d');
echo strftime("%A, %d de %B de %Y", strtotime($date));*/

date_default_timezone_set('America/Sao_Paulo');
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$semana = date('w');

// configuração mes 
switch ($mes){
case 1: $mes = "janeiro"; break;
case 2: $mes = "fevereiro"; break;
case 3: $mes = "março"; break;
case 4: $mes = "abril"; break;
case 5: $mes = "maio"; break;
case 6: $mes = "junho"; break;
case 7: $mes = "julho"; break;
case 8: $mes = "agosto"; break;
case 9: $mes = "setembro"; break;
case 10: $mes = "outubro"; break;
case 11: $mes = "novembro"; break;
case 12: $mes = "dezembro"; break;

}

// configuração semana 
switch ($semana) {
case 0: $semana = "Domingo"; break;
case 1: $semana = "Segunda-feira"; break;
case 2: $semana = "Terça-feira"; break;
case 3: $semana = "Quarta-feira"; break;
case 4: $semana = "Quinta-feira"; break;
case 5: $semana = "Sexta-feira"; break;
case 6: $semana = "Sábado"; break;

}
//Agora basta imprimir na tela...
echo ("$semana, $dia de $mes de $ano");

?>