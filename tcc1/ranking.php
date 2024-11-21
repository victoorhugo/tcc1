<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilonavbar.css"/>
    <link rel="stylesheet" href="css/estiloranking.css"/>
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

    <div class="parent">
      <div class="container">
        <h1>Ranking Top 10</h1>
        
        <!-- Campo de Pesquisa -->
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Digite o nome do usuário">
            <button onclick="searchUser()">Pesquisar</button>
        </div>
        
        <!-- Ranking Table -->
        <table id="ranking-table">
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Usuário</th>
                    <th>Pontos</th>
                </tr>
            </thead>
            <tbody id="ranking-body">
                <!-- Dados do ranking serão inseridos aqui via JavaScript -->
            </tbody>
        </table>

        <!-- Resultado da pesquisa -->
        <div id="search-result" class="hidden"></div>
     </div>
    </div>

<script src="js/script.js"></script>
<script src="js/scriptranking.js"></script>

</body>
</html>
