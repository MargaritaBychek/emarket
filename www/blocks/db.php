<?php
$host = 'localhost'; 
$database = 'emarket'; 
$user = 'root'; 
$password = ''; 

$link = mysqli_connect($host, $user, $password, $database,"3308") 
    or die("Ошибка " . mysqli_error($link));

?>

