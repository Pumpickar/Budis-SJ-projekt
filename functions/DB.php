<?php
$host = 'localhost'; 
$username = 'username'; 
$password = 'password'; 
$database = 'projektova_databaza'; 


$connection = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    die('Chyba s prihlásením do MySQL: ' . mysqli_connect_error());
}

?>

