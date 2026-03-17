document.addEventListener("DOMContentLoaded", () => {

    const searchInput = document.querySelector("#search");
    const searchBtn = document.querySelector("#searchBtn");
    const toolCards = document.querySelectorAll(".tool-card");

    function runSearch() {
        const query = searchInput.value.toLowerCase().trim();

        toolCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            const matchesSearch = text.includes(query);

            // Respect filter state from script.js
            const isFilteredOut = card.dataset.filtered === "true";

            card.style.display = (matchesSearch && !isFilteredOut)
                ? "flex"
                : "none";
        });
    }

    searchInput.addEventListener("input", runSearch);

    searchBtn.addEventListener("click", (e) => {
        e.preventDefault();
        runSearch();
    });

    // When filters change, re-run search
    document.addEventListener("filters-updated", runSearch);

});