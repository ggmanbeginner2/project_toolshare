document.addEventListener("DOMContentLoaded", () => {

    const filterBtn = document.querySelector("#filterBtn");
    const filterPopup = document.querySelector("#filterPopup");
    const closeFilter = document.querySelector("#closeFilter");
    const applyFilter = document.querySelector("#applyFilter");

    const categorySelect = document.querySelector("#filterCategory");
    const statusSelect = document.querySelector("#filterStatus");
    const toolCards = document.querySelectorAll(".tool-card");

    function togglePopup(show) {
        filterPopup.style.display = show ? "block" : "none";
    }

    filterBtn.addEventListener("click", () => togglePopup(true));
    closeFilter.addEventListener("click", () => togglePopup(false));

    applyFilter.addEventListener("click", () => {
        const selectedCategory = categorySelect.value.toLowerCase();
        const selectedStatus = statusSelect.value.toLowerCase();

        toolCards.forEach(card => {
            const category = card.dataset.category.toLowerCase();
            const status = card.dataset.status.toLowerCase();

            const matchCategory = !selectedCategory || category === selectedCategory;
            const matchStatus = !selectedStatus || status === selectedStatus;

            const visible = matchCategory && matchStatus;

            // mark filtered state for search.js
            card.dataset.filtered = visible ? "false" : "true";

            card.style.display = visible ? "flex" : "none";
        });

        togglePopup(false);

        // notify search.js to re-run search
        document.dispatchEvent(new Event("filters-updated"));
    });

});