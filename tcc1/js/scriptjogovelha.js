let board = ['', '', '', '', '', '', '', '', ''];
let currentPlayer;
let userSymbol;
let computerSymbol;
let gameActive = false;
let difficultyLevel;
let score = 0; 
let currentUserId = 1; // Defina o ID do usuário corretamente (substitua por valor dinâmico conforme necessário)

function showGame(gameId) {
    const containers = document.querySelectorAll('.container');
    containers.forEach(container => {
        container.style.display = 'none'; 
    });

    const selectedGame = document.getElementById(gameId);
    if (selectedGame) {
        selectedGame.style.display = 'block';
        document.querySelectorAll('.reset-container').forEach(reset => {
            reset.style.display = 'none';
        });
        const resetButton = selectedGame.querySelector('.reset-container');
        if (resetButton) {
            resetButton.style.display = 'block';
        }

        if (gameId === 'game2') {
            startMemoryGame(); 
        } else if (gameId === 'game1') {
            resetGame(); // Certifica-se de que o botão de reinício estará visível
        } else if (gameId === 'game3') {
            startQuizGame();
        }
    }
}

function startGame(symbol) {
    userSymbol = symbol;
    computerSymbol = userSymbol === 'X' ? 'O' : 'X';
    currentPlayer = userSymbol;
    gameActive = true;
    document.getElementById('choice').style.display = 'none';
    document.getElementById('difficulty').style.display = 'block';
}

function setDifficulty(level) {
    difficultyLevel = level;
    document.getElementById('difficulty').style.display = 'none';
    document.getElementById('gameBoard').style.display = 'grid';
    document.getElementById('status').textContent = `Você é ${userSymbol}. Sua vez!`;
    renderBoard();
}

function saveScoreToServer(userId, points, gameId) {
    console.log(`Salvando pontuação: userId=${userId}, points=${points}, gameId=${gameId}`);

    fetch("banco/save_score.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ userId: userId, points: points, gameId: gameId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log("Pontuação salva com sucesso:", data.message);
        } else {
            console.error("Falha ao salvar a pontuação:", data.error);
        }
    })
    .catch(error => console.error("Erro de rede:", error));
}


function renderBoard() {
    const gameBoardElement = document.getElementById('gameBoard');
    gameBoardElement.innerHTML = '';

    board.forEach((cell, index) => {
        const cellElement = document.createElement('div');
        cellElement.classList.add('cell');
        cellElement.textContent = cell;
        cellElement.addEventListener('click', () => handleCellClick(index));
        gameBoardElement.appendChild(cellElement);
    });
}

function checkResult() {
    const winningConditions = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8],
        [0, 3, 6], [1, 4, 7], [2, 5, 8],
        [0, 4, 8], [2, 4, 6]
    ];

    let roundWon = false;
    for (let i = 0; i < winningConditions.length; i++) {
        const [a, b, c] = winningConditions[i];
        if (board[a] && board[a] === board[b] && board[a] === board[c]) {
            roundWon = true;
            break;
        }
    }

    if (roundWon) {
        if (currentPlayer === userSymbol) {
            // Atualiza a pontuação com base na dificuldade
            if (difficultyLevel === 'easy') score += 1;
            else if (difficultyLevel === 'medium') score += 2;
            else if (difficultyLevel === 'hard') score += 3;

            // Envia a pontuação e vitória para o servidor
            saveScoreToServer(currentUserId, score, 1) // Passa o ID do jogo como 1

            // Atualiza o status após salvar a pontuação
            document.getElementById('status').textContent = `Você venceu! Pontuação: ${score}`;
        } else {
            document.getElementById('status').textContent = 'Computador venceu!';
        }
        gameActive = false;
        return true;
    }

    if (!board.includes('')) {
        document.getElementById('status').textContent = 'Empate!';
        gameActive = false;
        return true;
    }
    return false;
}

function handleCellClick(index) {
    if (board[index] === '' && gameActive && currentPlayer === userSymbol) {
        board[index] = userSymbol;
        renderBoard();

        if (!checkResult()) {
            currentPlayer = computerSymbol;
            document.getElementById('status').textContent = "Vez do computador...";
            setTimeout(computerMove, 500);
        }
    }
}

function computerMove() {
    let move;

    if (difficultyLevel === 'easy') {
        move = makeRandomMove();
    } else if (difficultyLevel === 'medium') {
        move = makeMediumMove();
    } else {
        move = makeSmartMove();
    }

    board[move] = computerSymbol;
    renderBoard();

    if (!checkResult()) {
        currentPlayer = userSymbol; // Muda para o jogador
        document.getElementById('status').textContent = "Sua vez!";
    }
}

function makeRandomMove() {
    let availableCells = board.map((cell, index) => cell === '' ? index : null).filter(index => index !== null);
    return availableCells[Math.floor(Math.random() * availableCells.length)];
}

function makeMediumMove() {
    for (let i = 0; i < board.length; i++) {
        if (board[i] === '') {
            board[i] = computerSymbol;
            if (isWinningMove(computerSymbol)) return i;
            board[i] = '';
        }
    }

    for (let i = 0; i < board.length; i++) {
        if (board[i] === '') {
            board[i] = userSymbol; // Simula jogada do jogador
            if (isWinningMove(userSymbol)) {
                board[i] = ''; // Reseta a célula
                return i; // Retorna a jogada que bloqueia o jogador
            }
            board[i] = ''; // Reseta a célula
        }
    }

    return makeRandomMove(); // Se não houver jogada de vitória ou bloqueio, faz uma jogada aleatória
}

function isWinningMove(player) {
    const winningConditions = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8],
        [0, 3, 6], [1, 4, 7], [2, 5, 8],
        [0, 4, 8], [2, 4, 6]
    ];

    return winningConditions.some(condition => {
        const [a, b, c] = condition;
        return board[a] === player && board[b] === player && board[c] === '';
    });
}

function makeSmartMove() {
    // Implementar a lógica de jogada inteligente
}

function resetGame() {
    board = ['', '', '', '', '', '', '', '', ''];
    currentPlayer = userSymbol;
    gameActive = true;
    score = 0; // Reiniciar a pontuação
    document.getElementById('status').textContent = `Você é ${userSymbol}. Sua vez!`;
    renderBoard();
}