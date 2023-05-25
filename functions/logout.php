<?php
session_start();

$_SESSION = array();

session_destroy();

$cookie_name = "login_session";
$cookie_path = '/';
setcookie($cookie_name, '', time() - 259200, $cookie_path);

header("Location: ../index.php");


exit();
?>
