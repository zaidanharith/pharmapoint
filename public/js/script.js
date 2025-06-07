const navToggle = document.querySelector("#nav-toggle");
const navMenu = document.querySelector("#nav-menu");
navToggle.addEventListener("click", function () {
    navToggle.classList.toggle("nav-toggle-active");
    navMenu.classList.toggle("hidden");
});

function updateClock() {
    const now = new Date();
    const options = {
        day: "numeric",
        month: "long",
        year: "numeric",
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
        hour12: false,
    };
    document.getElementById("current-time").textContent = now.toLocaleString(
        "id-ID",
        options
    );
}

updateClock();
setInterval(updateClock, 1000);

const deleteKatalogBtn = document.querySelector("#delete-katalog-btn");
const cancelDeleteKatalogBtn = document.querySelector(
    "#cancel-delete-katalog-btn"
);
const deleteKatalogForm = document.querySelector("#delete-katalog-form");

deleteKatalogBtn.addEventListener("click", function () {
    deleteKatalogForm.style.display = "block";
});

cancelDeleteKatalogBtn.addEventListener("click", function () {
    deleteKatalogForm.style.display = "none";
});

const addButton = document.getElementById("add-description-btn");
const container = document.getElementById("description-container");

addButton.addEventListener("click", function () {
    const inputDiv = document.createElement("div");
    inputDiv.className = "description-input mb-3 flex items-center gap-2";

    inputDiv.innerHTML = `
                <input type="text" name="description[]" placeholder="Deskripsi produk" 
                    class="outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange w-full" required>
                <button type="button" class="remove-description text-red-500 hover:text-red-700">
                    <span class="material-symbols-outlined">close</span>
                </button>
            `;

    container.appendChild(inputDiv);

    // Add remove functionality
    const removeButton = inputDiv.querySelector(".remove-description");
    removeButton.addEventListener("click", function () {
        inputDiv.remove();
    });
});
