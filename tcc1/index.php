<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilonavbar.css"/>
    <link rel="stylesheet" href="css/estiloindex.css"/>
    
    <title>MathQuest</title>
  </head>
  <body>
    
  <nav class="navbar">
  <img src="img/logo.png" class="navbar-logo" alt="logo" />
  <button class="navbar-toggle" id="navbar-toggle">
    <i class="fas fa-bars"></i>
  </button>
  <ul class="navbar-list" id="navbar-list">
    <li><a href="home.php">Inicio</a></li>
    <li><a href="jogos.php">Jogos</a></li>
  </ul>
  <div class="auth-buttons">
    <a href="login.php" class="auth-btn">Entre/Cadastre-se</a>
  </div>
</nav>

<main id="content">
    <div id="banner">
        <div class="banner-text">
            <h1>Bem-vindo ao nosso portal de aprendizado divertido!</h1>
            <h4>
                Aqui, você vai aprender matemática e raciocínio lógico de uma maneira
                completamente nova: jogando! Nosso objetivo é tornar o aprendizado
                mais emocionante, através de desafios que estimulam sua mente e
                recompensam seu progresso.
            </h4>
            <h3>
                Enfrente jogos e desafios matemáticos que vão te ajudar a desenvolver suas habilidades de forma divertida e interativa.
            </h3>
            <h3>
                A cada desafio completado, você acumula pontos e desbloqueia prêmios!
            </h3>
            <h3>
                Participe de um ranking onde você pode competir com seus amigos. Mostre quem domina os desafios e alcance o topo da tabela!
            </h3>
            <h3>
                <strong>Novidade:</strong> Personalize seu personagem com itens únicos e temáticos ao subir de nível. Torne seu aprendizado ainda mais especial!
            </h3>
            <h3>
                Entre agora e comece sua jornada rumo ao conhecimento com diversão garantida!
            </h3>
        </div>
        <img src="img/crianca.png" alt="Imagem de uma criança se divertindo com aprendizado">
    </div>

    <!-- Seção de Jogos em Destaque -->
    <section class="square-container">
        <div class="square">Jogo de Matemática</div>
        <div class="square">Desafio Lógico</div>
        <div class="square">Raciocínio Rápido</div>
        <div class="square">Exploração Numérica</div>
    </section>

    <!-- Seção de Benefícios -->
    <section id="benefits">
        <h2>Por que escolher nosso portal?</h2>
        <ul>
            <li>✔ Aumente sua concentração e raciocínio lógico.</li>
            <li>✔ Aprenda no seu próprio ritmo.</li>
            <li>✔ Competição saudável com amigos.</li>
            <li>✔ Progresso salvo para usuários cadastrados.</li>
        </ul>
    </section>

    <!-- Seção de Feedback -->
    <section id="feedback">
        <h2>O que dizem sobre nós?</h2>
        <blockquote>
            "O MathQuest tornou o aprendizado do meu filho muito mais divertido e produtivo!" 
            <br><span>- Ana, mãe de um usuário</span>
        </blockquote>
        <blockquote>
            "Os jogos de lógica são incríveis! Estou aprendendo muito enquanto me divirto." 
            <br><span>- Pedro, 10 anos</span>
        </blockquote>
    </section>
</main>

    <script src="js/script.js"></script>
  </body>
</html>