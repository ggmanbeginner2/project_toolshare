const loginBtn = document.getElementById("loginBtn");
const loginPopup = document.getElementById("loginPopup");
const closeLogin = document.getElementById("closeLogin");

loginBtn.addEventListener("click", () => {
    loginPopup.style.display = "flex";
});

closeLogin.addEventListener("click", () => {
    loginPopup.style.display = "none";
});