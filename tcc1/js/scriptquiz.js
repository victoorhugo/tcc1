function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function generateQuestions() {
    // Gera as operações para cada questão
    document.getElementById("operation1").innerText = `${getRandomInt(1, 10)} + ${getRandomInt(1, 10)}`;
    document.getElementById("operation2").innerText = `${getRandomInt(1, 10)} - ${getRandomInt(1, 10)}`;
    document.getElementById("operation3").innerText = `${getRandomInt(1, 10)} * ${getRandomInt(1, 10)}`;
    
    // Gera uma divisão que sempre resultará em um número inteiro
    const divisor = getRandomInt(1, 20); // Escolhe um divisor entre 1 e 20
    const quotient = getRandomInt(1, 10); // Escolhe um quociente (resultado da divisão)
    const dividend = divisor * quotient; // O dividendo será o divisor multiplicado pelo quociente

    document.getElementById("operation4").innerText = `${dividend} / ${divisor}`;
    
    document.getElementById("operation5").innerText = `${getRandomInt(1, 20)} + ${getRandomInt(1, 10)} - ${getRandomInt(1, 5)}`;
}

function checkAnswers() {
    // Coleta as respostas do usuário
    const answers = [
        { answer: document.getElementById("answer1").value, id: "operation1", resultId: "result1" },
        { answer: document.getElementById("answer2").value, id: "operation2", resultId: "result2" },
        { answer: document.getElementById("answer3").value, id: "operation3", resultId: "result3" },
        { answer: document.getElementById("answer4").value, id: "operation4", resultId: "result4" },
        { answer: document.getElementById("answer5").value, id: "operation5", resultId: "result5" },
    ];

    let allCorrect = true; // Flag para verificar se todas as respostas estão corretas
    let allFilled = true; // Flag para verificar se todas as respostas foram preenchidas

    answers.forEach((op) => {
        const answer = op.answer.trim();
        const correctAnswer = eval(document.getElementById(op.id).innerText);
        const resultSpan = document.getElementById(op.resultId);

        // Verifica se a resposta está em branco
        if (answer === "") {
            resultSpan.innerText = "Em branco!";
            allFilled = false; // Se alguma resposta estiver em branco, muda a flag
        } else if (parseFloat(answer) === correctAnswer) {
            resultSpan.innerText = "Correto!";
        } else {
            resultSpan.innerText = `Incorreto! A resposta correta é ${correctAnswer}.`;
            allCorrect = false; // Se alguma resposta estiver errada, não pode estar correto
        }
    });

    // Atualiza a pontuação apenas se todas as perguntas foram preenchidas
    const scoreElement = document.getElementById("score");
    if (allFilled) {
        if (allCorrect) {
            scoreElement.innerText = "Parabéns! Você ganhou 2 pontos.";
        } else {
            scoreElement.innerText = ""; // Não exibe pontuação se não estiver tudo correto
        }
    } else {
        scoreElement.innerText = ""; // Não exibe pontuação se não estiver tudo preenchido
    }
}

function resetQuiz() {
    // Limpa as respostas e resultados
    document.getElementById("answer1").value = "";
    document.getElementById("answer2").value = "";
    document.getElementById("answer3").value = "";
    document.getElementById("answer4").value = "";
    document.getElementById("answer5").value = "";

    document.querySelectorAll('.result').forEach(result => {
        result.innerText = ""; // Limpa as mensagens de resultado
    });

    document.getElementById("score").innerText = ""; // Limpa a mensagem de pontuação

    generateQuestions(); // Gera novas perguntas
}

// Inicializa o quiz com perguntas
generateQuestions();s