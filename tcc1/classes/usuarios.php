<?php
class Usuario {
    
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $email, $senha)
    {
        global $pdo;
        // Verificar se já existe email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return false; // Já está cadastrado
        } else {
            // Caso não, cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;
        }
    }

    public function logar($email, $senha)
    {
        global $pdo;
        // Verificar se o email e senha estão cadastrados
        $sql = $pdo->prepare("SELECT id_usuario, nome FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if ($sql->rowCount() > 0) {
            // Entrar no sistema (sessão)
            $dados = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dados['id_usuario'];
            $_SESSION['nome_usuario'] = $dados['nome']; // Armazena o nome do usuário
            return true; // Logado com sucesso
        } else {
            return false; // Não foi possível logar
        }
    }

    public function getId()
    {
        if (isset($_SESSION['id_usuario'])) {
            return $_SESSION['id_usuario'];
        }
        return null;
    }

    public function getPrimeiroNome()
    {
        if (isset($_SESSION['nome_usuario'])) {
            $nome_completo = $_SESSION['nome_usuario'];
            $nomes = explode(' ', $nome_completo);
            return $nomes[0]; // Retorna o primeiro nome
        }
        return null;
    }
}
?>
