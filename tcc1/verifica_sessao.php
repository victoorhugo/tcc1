<?php
session_start();
require_once 'classes/usuarios.php';
$u = new Usuario;

// Verificar se o usuário está logado
if (!isset($_SESSION["id_usuario"])) {
    header("location: login.php");
    exit();
}

// Conectar ao banco de dados
$u->conectar("login", "localhost", "root", "");

// Recuperar o primeiro nome do usuário
$primeiro_nome = $u->getPrimeiroNome();
?>