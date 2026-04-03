
const accBtn = document.getElementById("accBtn");
const accPopup = document.getElementById("accPopup");
const closeAcc = document.getElementById("closeAcc");

if (accBtn && accPopup && closeAcc) {
    accBtn.addEventListener("click", () => {
        accPopup.style.display = "flex";
    });

    closeAcc.addEventListener("click", () => {
        accPopup.style.display = "none";
    });
}