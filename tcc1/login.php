<?php
require_once 'classes/usuarios.php';
$u = new Usuario;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='utf-8'>
    <title>Login</title> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/estiloform.css'>
</head>
<body>
    <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" maxlength="40">
            <input type="password" name="senha" id="myPassword" placeholder="Senha" maxlength="15">
            <input type="submit" value="Acessar">
            <a href="cadastrar.php">Ainda não é inscrito?<strong>Inscreva-se</strong></a>
        </form>
        <?php
            if (isset($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        // Verificar se os campos estão preenchidos
        if (!empty($email) && !empty($senha)) {
            $u->conectar("login", "localhost", "root", "");
            if ($u->msgErro == "") { // Sem erros
                if ($u->logar($email, $senha)) {
                    header("Location: home.php");
                    exit;
                } else {
                    echo '<div class="msg-erro">Email e/ou senha estão incorretos!</div>';
                }
            } else {
                echo '<div class="msg-erro">Erro: ' . $u->msgErro . '</div>';
            }
        } else {
            echo '<div class="msg-erro">Preencha todos os campos!</div>';
        }
    }
?>
    </div>
</body>
</html>
