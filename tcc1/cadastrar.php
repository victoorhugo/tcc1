<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Page Title</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/estiloform.css'>
</head>
<body>
    <div id="corpo-form-cad">
        <h1>Cadastrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="40">
            <input type="email" name="email" placeholder="Email" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="Cadastrar">
            <a href="login.php">Já tem o cadastro?<strong>Entre!</strong></a>
        </form>

<?php
    // verificar se a pessoa clicou no botão
    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confsenha']);
        // verificar se está preenchido
        if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
        {
            $u->conectar("login", "localhost", "root", "");
            if ($u->msgErro == "") // está tudo ok
            {
                if ($senha == $confirmarSenha)
                {
                    if ($u->cadastrar($nome, $email, $senha))
                    {
                        ?>
                        <div id="msg-sucesso">Cadastrado com sucesso! Acesse para entrar</div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro">Email já cadastrado</div>
                        <?php                 
                    }
                }
                else 
                {
                    ?>
                    <div class="msg-erro">Senha e confirmar senha não correspondem</div>
                    <?php                
                }
            }
            else 
            {
                ?>
                <div class="msg-erro">  
                <?php echo "Erro: " . $u->msgErro;?>
                </div>
                <?php 
            
            }
        }
        else
        {
            ?>
            <div class="msg-erro">Preencha todos os campos!</div>
            <?php  
          
        }
    }
?>
    </div>
</body>
</html>
