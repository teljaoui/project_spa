function shownavhome() {
    const show = document.querySelector(".header-bottom");
    show.style.top = 0
}
function closenavhome() {
    const show = document.querySelector(".header-bottom");
    show.style.top = "-1000%"
}

document.querySelector('.logout').addEventListener("click", function(event) {
    if (!confirm("Are you sure you want to logout?")) {
        event.preventDefault();
    }
});