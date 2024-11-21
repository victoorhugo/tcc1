<?php
$host = 'localhost';
$user = 'usuario'; // Substitua pelo seu nome de usuário
$password = ''; // Substitua pela sua senha
$database = 'login';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>