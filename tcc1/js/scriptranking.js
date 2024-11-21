// Lista simulada de usuários com pontuações
const ranking = [
    { name: "Usuário1", points: 1500 },
    { name: "Usuário2", points: 1400 },
    { name: "Usuário3", points: 1350 },
    { name: "Usuário4", points: 1300 },
    { name: "Usuário5", points: 1250 },
    { name: "Usuário6", points: 1200 },
    { name: "Usuário7", points: 1150 },
    { name: "Usuário8", points: 1100 },
    { name: "Usuário9", points: 1050 },
    { name: "Usuário10", points: 1000 }
];

// Função para carregar o top 10 no HTML
function loadRanking() {
    const rankingBody = document.getElementById("ranking-body");
    ranking.forEach((user, index) => {
        const row = document.createElement("tr");
        row.innerHTML = `<td>${index + 1}</td><td>${user.name}</td><td>${user.points}</td>`;
        rankingBody.appendChild(row);
    });
}

// Função para pesquisar posição do usuário
function searchUser() {
    const searchInput = document.getElementById("search-input").value.toLowerCase();
    const resultContainer = document.getElementById("search-result");
    const foundUser = ranking.find((user, index) => user.name.toLowerCase() === searchInput);

    if (foundUser) {
        const position = ranking.indexOf(foundUser) + 1;
        resultContainer.innerHTML = `O usuário <strong>${foundUser.name}</strong> está na posição <strong>${position}</strong> com <strong>${foundUser.points}</strong> pontos.`;
        resultContainer.classList.remove("hidden");
    } else {
        resultContainer.innerHTML = "Usuário não encontrado no Top 10.";
        resultContainer.classList.remove("hidden");
    }
}

// Carregar o ranking ao abrir a página
window.onload = loadRanking;
