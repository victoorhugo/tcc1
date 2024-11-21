function showGame(gameId) {
    const games = document.querySelectorAll('.container');
    games.forEach(game => {
        game.style.display = 'none'; // Oculta todos os jogos
    });

    const selectedGame = document.getElementById(gameId);
    if (selectedGame) { // Verifica se o jogo selecionado existe
        selectedGame.style.display = 'block'; // Exibe o jogo selecionado
        
        // Inicia a lógica do jogo correspondente
        if (gameId === 'game3') { // Jogo da Memória
            startMemoryGame();
        } else if (gameId === 'game1') { // Jogo da Velha, por exemplo
            startTicTacToe();
        } 
        // Adicione mais condições para outros jogos conforme necessário
    } else {
        console.error(`Jogo com ID "${gameId}" não encontrado.`);
    }
}
