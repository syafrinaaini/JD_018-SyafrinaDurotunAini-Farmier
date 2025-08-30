document.addEventListener("DOMContentLoaded", () => {
    const select = document.getElementById("role-select");
    const search = document.getElementById("role-search");
    const options = document.getElementById("role-options");
    const hiddenInput = document.getElementById("role-input");

    // buka/tutup dropdown
    search.addEventListener("click", () => {
        options.classList.toggle("hidden");
    });

    // pilih role
    document.querySelectorAll("#role-options li").forEach(item => {
        item.addEventListener("click", () => {
            search.value = item.textContent.trim();
            hiddenInput.value = item.dataset.value;
            options.classList.add("hidden");
        });
    });

    // klik di luar nutup dropdown
    document.addEventListener("click", (e) => {
        if (!select.contains(e.target)) {
            options.classList.add("hidden");
        }
    });
});
