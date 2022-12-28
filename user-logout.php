<?php 

session_start();
session_destroy();

$url = '/user-login.php';
header("Location: {$url}",302);

?>