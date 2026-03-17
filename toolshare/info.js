document.addEventListener("DOMContentLoaded", () => {

    const detailPanel = document.querySelector(".tool-details");

    document.addEventListener("click", (e) => {
        if (!e.target.classList.contains("info-btn")) return;

        const card = e.target.closest(".tool-card");

        const naam = card.dataset.naam;
        const categorie = card.dataset.categorie;
        const conditie = card.dataset.conditie;
        const locatie = card.dataset.locatie;
        const omschrijving = card.dataset.omschrijving;
        const beschikbaar = card.dataset.beschikbaar;

        detailPanel.innerHTML = `
            <h2>${naam}</h2>
            <p><strong>Categorie:</strong> ${categorie}</p>
            <p><strong>Conditie:</strong> ${conditie}</p>
            <p><strong>Locatie:</strong> ${locatie}</p>
            <p><strong>Omschrijving:</strong> ${omschrijving}</p>
            <p><strong>Status:</strong> ${beschikbaar}</p>
        `;
    });

});