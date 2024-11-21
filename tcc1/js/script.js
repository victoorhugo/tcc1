document.addEventListener("DOMContentLoaded", () => {
  // Seletores
  const navbarToggle = document.querySelector(".navbar-toggle");
  const navbarList = document.querySelector(".navbar-list");
  const profileDropdownBtn = document.querySelector(".profile-dropdown-btn");
  const profileDropdownList = document.querySelector(".profile-dropdown-list");

  // Toggle do menu móvel
  if (navbarToggle && navbarList) {
    navbarToggle.addEventListener("click", () => {
      navbarList.classList.toggle("show");

      // Fecha o dropdown de perfil ao abrir o menu móvel
      if (profileDropdownList) {
        profileDropdownList.classList.remove("active");
      }
    });
  }

  // Toggle do dropdown de perfil para telas maiores
  if (profileDropdownBtn && profileDropdownList) {
    profileDropdownBtn.addEventListener("click", (e) => {
      e.stopPropagation(); // Impede o clique de propagação para o window
      profileDropdownList.classList.toggle("active");
    });

    // Fechar dropdown ao clicar fora
    window.addEventListener("click", (e) => {
      if (
        profileDropdownList.classList.contains("active") &&
        !profileDropdownBtn.contains(e.target) &&
        !profileDropdownList.contains(e.target)
      ) {
        profileDropdownList.classList.remove("active");
      }
    });
  }

  // Fechar menu móvel ao clicar fora (opcional)
  window.addEventListener("click", (e) => {
    if (
      navbarList.classList.contains("show") &&
      !navbarToggle.contains(e.target) &&
      !navbarList.contains(e.target)
    ) {
      navbarList.classList.remove("show");
    }
  });
});
