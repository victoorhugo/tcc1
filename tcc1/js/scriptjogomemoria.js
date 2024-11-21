    let cards = [];
    let flippedCards = [];
    let matchedCards = 0;
    let finalScore = 0; // Pontuação final que será de 2 pontos ao vencer

    function showGame(gameId) {
        // Oculta todos os jogos
        document.querySelectorAll('.container').forEach(container => {
            container.style.display = 'none';
        });
    
        // Exibe o jogo selecionado
        const selectedGame = document.getElementById(gameId);
        if (selectedGame) {
            selectedGame.style.display = 'block';
            
            // Exibe o botão de reinício para o jogo específico
            document.querySelectorAll('.reset-container').forEach(reset => {
                reset.style.display = 'none';
            });
            const resetButton = selectedGame.querySelector('.reset-container');
            if (resetButton) resetButton.style.display = 'block';
    
            // Inicializa o jogo específico conforme o gameId
            if (gameId === 'game1') startGame();
            else if (gameId === 'game2') startMemoryGame();
            else if (gameId === 'game3') generateQuestions();
        }
    }
    
    const cardValues = ['1', '2', '3', '4', '5', '6', '7', '8'];

    function startMemoryGame() {
        const gameBoard = document.getElementById('memoryGameBoard');
        gameBoard.innerHTML = '';
        document.getElementById('memoryStatus').textContent = ''; // Limpa o status ao iniciar o jogo
        document.querySelector('.reset-container').style.display = 'none'; // Esconde o botão de reiniciar no início

        matchedCards = 0; // Reseta a contagem de pares

        // Duplicar os valores das cartas e embaralhar
        cards = [...cardValues, ...cardValues]
            .sort(() => Math.random() - 0.5)
            .map(value => createCardElement(value));

        // Adicionar cada carta ao tabuleiro do jogo
        cards.forEach(card => gameBoard.appendChild(card));
    }

    function createCardElement(value) {
        const card = document.createElement('div');
        card.classList.add('memory-card');
        card.dataset.value = value;
        card.addEventListener('click', handleCardClick);
        return card;
    }

    function handleCardClick(event) {
        const clickedCard = event.target;

        // Impedir clicar em mais de 2 cartas ou em uma carta já combinada
        if (flippedCards.length < 2 && !clickedCard.classList.contains('flipped') && !clickedCard.classList.contains('correct')) {
            clickedCard.classList.add('flipped');
            clickedCard.textContent = clickedCard.dataset.value;
            flippedCards.push(clickedCard);

            // Verificar combinação se duas cartas estiverem viradas
            if (flippedCards.length === 2) {
                checkMatch();
            }
        }
    }

    function checkMatch() {
        const [card1, card2] = flippedCards;
        const isMatch = card1.dataset.value === card2.dataset.value;

        if (isMatch) {
            card1.classList.add('correct');
            card2.classList.add('correct');
            matchedCards += 2;

            // Verifica se todas as cartas foram combinadas
            if (matchedCards === cards.length) {
                finalScore = 2; // Atribui 2 pontos ao final do jogo
                setTimeout(() => {
                    document.getElementById('memoryStatus').textContent = `Você venceu! Pontuação: ${finalScore}`; // Mensagem de vitória
                    document.querySelector('.reset-container').style.display = 'block'; // Garante que o botão de reiniciar esteja visível
                }, 300);
            }
        } else {
            // Se não houver correspondência, vire as cartas de volta após um atraso
            setTimeout(() => {
                card1.classList.remove('flipped');
                card2.classList.remove('flipped');
                card1.textContent = '';
                card2.textContent = '';
            }, 1000);
        }

        flippedCards = []; // Reinicia o array de cartas viradas
    }

    function resetMemoryGame() {
        flippedCards = [];
        matchedCards = 0;
        finalScore = 0; // Reseta a pontuação final ao reiniciar
        startMemoryGame(); // Reinicia o jogo
    }
