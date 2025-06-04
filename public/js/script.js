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
