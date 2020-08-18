<?php
// Fix de seguridad
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);
header("X-XSS-Protection: 1; mode=block");

ini_set('session.use_cookies', 1);
ini_set('session.hash_function', "sha512");
  
session_start();

define('_ADF', 1);

require_once './app/core/App.php';
require_once './app/core/Controller.php';
?>