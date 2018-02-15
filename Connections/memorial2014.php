<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_memorial2014 = "localhost";
$database_memorial2014 = "memorial";
$username_memorial2014 = "root";
$password_memorial2014 = "";
$memorial2014 = mysql_pconnect($hostname_memorial2014, $username_memorial2014, $password_memorial2014) or trigger_error(mysql_error(),E_USER_ERROR); 
?>