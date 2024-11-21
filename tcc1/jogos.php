<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilojogo.css"/> <!-- Estilo do Jogo -->
    <link rel="stylesheet" href="css/estilonavbar.css"/> <!-- Estilo da Navbar -->
    <title>MathQuest</title>
</head>
<body>

<?php
include 'verifica_sessao.php'; // Inclui o arquivo de verificação de sessão
?>

<nav class="navbar">
  <img src="img/logo.png" class="navbar-logo" alt="logo" />
  
  <!-- Lista de navegação -->
  <ul id="navbar-list" class="navbar-list">
    <li><a href="home.php">Inicio</a></li>
    <li><a href="jogos.php">Jogos</a></li>
    <li><a href="ranking.php">Ranking</a></li>
    <li class="mobile-logout">
      <a href="Sair.php">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        Sair
      </a>
    </li>
  </ul>

  <!-- Botão de hambúrguer para dispositivos móveis -->
  <button id="navbar-toggle" class="navbar-toggle">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Dropdown de perfil, visível em telas grandes -->
  <div class="profile-dropdown">
    <div onclick="toggle()" class="profile-dropdown-btn">
      <div class="profile-img">
        <i class="fa-regular fa-user"></i>
      </div>
      <span>
        <?php echo htmlspecialchars($primeiro_nome); ?>
        <i class="fa-solid fa-angle-down"></i>
      </span>
    </div>

    <ul class="profile-dropdown-list">
      <li class="profile-dropdown-list-item">
        <a href="Sair.php">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          Sair
        </a>
      </li>
    </ul>
  </div>
</nav>

<div class="main-container">
    <h3>Bem vindo a tela de Jogos!</h3><br>

    <nav id="game-nav">
        <div class="game-option" onclick="showGame('game1')">
            <img src="img/jogovelha.jpg" alt="Jogo da Velha">
            <span>Jogo da Velha</span>
        </div>
        <div class="game-option" onclick="showGame('game2')">
            <img src="img/jogomemoria.jpg" alt="Jogo da Memória">
            <span>Jogo da Memória</span>
        </div>
        <div class="game-option" onclick="showGame('game3')">
            <img src="img/Quizmatematico.jpg" alt="Quiz Matemático">
            <span>Quiz Matemático</span>
        </div>
    </nav>

    <div class="container" id="game1" style="display: none;">
        <div class="game-container">
            <div id="choice">
                <label>Escolha seu símbolo:</label>
                <button onclick="startGame('X')">X</button>
                <button onclick="startGame('O')">O</button>
            </div>
            <div id="difficulty" style="display: none;">
                <label>Escolha o nível de dificuldade:</label>
                <button onclick="setDifficulty('easy')">Fácil</button>
                <button onclick="setDifficulty('medium')">Intermediário</button>
                <button onclick="setDifficulty('hard')">Difícil</button>
            </div>
            <div id="gameBoard" style="display: none;"></div>
            <div id="status">Status: Jogador</div>
            <div class="reset-container"> 
                <button onclick="resetGame()">Reiniciar Jogo</button>
            </div>
        </div>
    </div>

    <div class="container" id="game2" style="display: none;">
        <div id="memoryGameBoard"></div>
        <div id="memoryStatus" class="status"></div> 
        <div class="reset-container">
            <button onclick="resetMemoryGame()">Reiniciar Jogo</button>
        </div>
    </div>

    <div class="container" id="game3" style="display: none;">
        <div class="game-container">
            <div class="question">
                <span id="operation1"></span> = <input type="number" id="answer1">
                <span id="result1" class="result"></span>
            </div>
            <div class="question">
                <span id="operation2"></span> = <input type="number" id="answer2">
                <span id="result2" class="result"></span>
            </div>
            <div class="question">
                <span id="operation3"></span> = <input type="number" id="answer3">
                <span id="result3" class="result"></span>
            </div>
            <div class="question">
                <span id="operation4"></span> = <input type="number" id="answer4">
                <span id="result4" class="result"></span>
            </div>
            <div class="question">
                <span id="operation5"></span> = <input type="number" id="answer5">
                <span id="result5" class="result"></span>
            </div>
            <button onclick="checkAnswers()">Enviar Respostas</button>
            <button onclick="resetQuiz()">Reiniciar Quiz</button>
            <div id="score" class="score"></div>
        </div>
    </div>
</div>

<script src="js/scriptquiz.js"></script>
<script src="js/scriptjogovelha.js"></script>
<script src="js/scriptjogomemoria.js"></script>
<script src="js/scriptjogo.js"></script>
<script src="js/script.js"></script>

</body>
</html>
