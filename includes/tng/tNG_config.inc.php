<?php
define('domain', 'http://localhost/Memorial');

// Array definitions
  $tNG_login_config = array();
  $tNG_login_config_session = array();
  $tNG_login_config_redirect_success  = array();
  $tNG_login_config_redirect_failed  = array();

// Start Variable definitions
  $tNG_debug_mode = "DEVELOPMENT";
  $tNG_debug_log_type = "";
  $tNG_debug_email_to = "you@yoursite.com";
  $tNG_debug_email_subject = "[BUG] The site went down";
  $tNG_debug_email_from = "webserver@yoursite.com";
  $tNG_email_host = "smtp.colegiomemorial.com.br";
  $tNG_email_user = "contato@colegiomemorial.com.br";
  $tNG_email_port = "587";
  $tNG_email_password = "memo2322";
  $tNG_email_defaultFrom = "contato@colegiomemorial.com.br";
  $tNG_login_config["connection"] = "memorial2014";
  $tNG_login_config["table"] = "usuario_u";
  $tNG_login_config["pk_field"] = "u_id";
  $tNG_login_config["pk_type"] = "NUMERIC_TYPE";
  $tNG_login_config["email_field"] = "u_email";
  $tNG_login_config["user_field"] = "u_login";
  $tNG_login_config["password_field"] = "u_senha";
  $tNG_login_config["level_field"] = "";
  $tNG_login_config["level_type"] = "STRING_TYPE";
  $tNG_login_config["randomkey_field"] = "";
  $tNG_login_config["activation_field"] = "";
  $tNG_login_config["password_encrypt"] = "true";
  $tNG_login_config["autologin_expires"] = "30";
  $tNG_login_config["redirect_failed"] = "painel_memo/index.php";
  $tNG_login_config["redirect_success"] = "painel_memo/_menu.php";
  $tNG_login_config["login_page"] = "painel_memo/index.php";
  $tNG_login_config["max_tries"] = "";
  $tNG_login_config["max_tries_field"] = "";
  $tNG_login_config["max_tries_disableinterval"] = "";
  $tNG_login_config["max_tries_disabledate_field"] = "";
  $tNG_login_config["registration_date_field"] = "";
  $tNG_login_config["expiration_interval_field"] = "";
  $tNG_login_config["expiration_interval_default"] = "";
  $tNG_login_config["logger_pk"] = "";
  $tNG_login_config["logger_table"] = "";
  $tNG_login_config["logger_user_id"] = "";
  $tNG_login_config["logger_ip"] = "";
  $tNG_login_config["logger_datein"] = "";
  $tNG_login_config["logger_datelastactivity"] = "";
  $tNG_login_config["logger_session"] = "";
  $tNG_login_config_session["kt_login_id"] = "u_id";
  $tNG_login_config_session["kt_login_user"] = "u_login";
// End Variable definitions
?>